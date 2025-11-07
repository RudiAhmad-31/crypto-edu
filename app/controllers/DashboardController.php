<?php
class DashboardController {
    public function index() {
        require_once '../app/views/dashboard/index.php';
    }

    public function loadDemo($feature) {
        $allowed = ['login', 'database', 'super', 'file', 'stegano'];
        if (in_array($feature, $allowed)) {
            require_once "../app/views/dashboard/modal_{$feature}.php";
        } else {
            echo "<p>Fitur tidak ditemukan.</p>";
        }
    }
}
?>
