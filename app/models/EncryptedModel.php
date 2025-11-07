<?php
class EncryptedModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function saveEncryptedData($feature_name, $user_id, $plaintext) {
        require_once '../app/helpers/ScytaleHelper.php';
        require_once '../app/helpers/Salsa20Helper.php';
        require_once '../app/helpers/CryptoHelper.php';

        // Superenkripsi: Scytale → Salsa20 → ChaCha20
        $scytale = ScytaleHelper::encrypt($plaintext);
        $salsa = Salsa20Helper::encrypt($scytale);
        $final = CryptoHelper::encrypt($salsa);

        $stmt = $this->db->prepare("INSERT INTO encrypted_data (feature_name, user_id, encrypted_value) VALUES (?, ?, ?)");
        return $stmt->execute([$feature_name, $user_id, $final]);
    }

    public function getDecryptedDataByUser($user_id) {
        require_once '../app/helpers/ScytaleHelper.php';
        require_once '../app/helpers/Salsa20Helper.php';
        require_once '../app/helpers/CryptoHelper.php';

        $stmt = $this->db->prepare("SELECT * FROM encrypted_data WHERE user_id = ?");
        $stmt->execute([$user_id]);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as &$row) {
            try {
                // Dekripsi berurutan: ChaCha20 → Salsa20 → Scytale
                $salsa = CryptoHelper::decrypt($row['encrypted_value']);
                $scytale = Salsa20Helper::decrypt($salsa);
                $plaintext = ScytaleHelper::decrypt($scytale);
                $row['decrypted_value'] = $plaintext;
            } catch (Exception $e) {
                $row['decrypted_value'] = '[Gagal didekripsi]';
            }
        }

        return $result;
    }
}
