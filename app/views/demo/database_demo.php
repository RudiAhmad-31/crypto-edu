<div id="database-demo-content" class="text-[#F8F8F8] text-center">
    <!-- STEP 1: Input Password -->
    <div class="step" data-step="1">
        <h2 class="text-lg font-semibold mb-2 text-[#FCA311]">Langkah 1: Input Password</h2>
        <p class="text-sm mb-4">Masukkan password yang akan di-hash dengan Scrypt dan dienkripsi menggunakan ChaCha20 sebelum disimpan ke database.</p>

        <input
            type="password"
            id="dbPassword"
            placeholder="Masukkan password..."
            class="w-full px-3 py-2 mb-4 rounded-md border border-black text-[#1E1E24]"
        />

        <button
            id="dbEncryptPasswordBtn"
            class="bg-[#3da9fc] text-white px-4 py-2 rounded-md border border-black font-medium hover:bg-[#3295e8] transition"
        >
            Enkripsi Password
        </button>
        
    </div>

    <!-- STEP 2: Hasil Enkripsi Password -->
    <div class="step hidden" data-step="2">
        <h2 class="text-lg font-semibold mb-2 text-[#FCA311]">Langkah 2: Hasil Enkripsi Password</h2>
        <p class="text-sm mb-4">Berikut adalah hasil enkripsi password Anda setelah melalui proses Scrypt dan ChaCha20:</p>

        <pre id="dbPasswordOutput" class="bg-[#1E1E24] text-[#F8F8F8] p-3 rounded-md overflow-auto text-sm text-left"></pre>

        <button
            id="dbNextToText"
            class="mt-4 bg-[#3da9fc] text-white px-4 py-2 rounded-md border border-black font-medium hover:bg-[#3295e8] transition"
        >
            Lanjutkan ke Enkripsi Teks
        </button>
    </div>

    <!-- STEP 3: Input Teks -->
    <div class="step hidden" data-step="3">
        <h2 class="text-lg font-semibold mb-2 text-[#FCA311]">Langkah 3: Input Teks Biasa</h2>
        <p class="text-sm mb-4">Masukkan teks yang akan dienkripsi menggunakan Scytale → Salsa20 → ChaCha20.</p>

        <textarea
            id="dbPlainText"
            placeholder="Masukkan teks biasa..."
            class="w-full px-3 py-2 mb-4 rounded-md border border-black text-[#1E1E24]"
            rows="4"
        ></textarea>

        <button
            id="dbEncryptTextBtn"
            class="bg-[#3da9fc] text-white px-4 py-2 rounded-md border border-black font-medium hover:bg-[#3295e8] transition"
        >
            Enkripsi Teks
        </button>
    </div>

    <!-- STEP 4: Hasil Enkripsi Teks -->
    <div class="step hidden" data-step="4">
        <h2 class="text-lg font-semibold mb-2 text-[#FCA311]">Langkah 4: Hasil Enkripsi Teks</h2>
        <p class="text-sm mb-4">Berikut adalah hasil enkripsi teks Anda setelah melalui Scytale → Salsa20 → ChaCha20:</p>

        <pre id="dbTextOutput" class="bg-[#1E1E24] text-[#F8F8F8] p-3 rounded-md overflow-auto text-sm text-left"></pre>

        <button
            id="dbNextToDecrypt"
            class="mt-4 bg-[#3da9fc] text-white px-4 py-2 rounded-md border border-black font-medium hover:bg-[#3295e8] transition"
        >
            Lanjutkan ke Dekripsi
        </button>
    </div>

    <!-- STEP 5: Hasil Dekripsi -->
    <div class="step hidden" data-step="5">
        <h2 class="text-lg font-semibold mb-2 text-[#FCA311]">Langkah 5: Hasil Dekripsi</h2>
        <p class="text-sm mb-4">Teks yang telah dienkripsi akan didekripsi kembali secara berurutan: ChaCha20 → Salsa20 → Scytale.</p>

        <pre id="dbDecryptedText" class="bg-[#1E1E24] text-[#F8F8F8] p-3 rounded-md overflow-auto text-sm text-left"></pre>

        <button
            id="dbNextToExplain"
            class="mt-4 bg-[#3da9fc] text-white px-4 py-2 rounded-md border border-black font-medium hover:bg-[#3295e8] transition"
        >
            Lanjutkan ke Penjelasan
        </button>
    </div>

    <!-- STEP 6: Penjelasan Algoritma -->
    <div class="step hidden" data-step="6">
        <h2 class="text-lg font-semibold mb-2 text-[#FCA311]">Penjelasan Algoritma ChaCha20</h2>
        <p class="text-sm leading-relaxed text-left">
            <strong>ChaCha20</strong> adalah algoritma stream cipher yang cepat dan aman, digunakan untuk mengenkripsi data dengan efisiensi tinggi. <br /><br />
            Dalam demo ini, ChaCha20 digunakan untuk mengenkripsi hasil dari:
            <ul class="list-disc list-inside text-left ml-4">
                <li>Hash password (hasil dari Scrypt)</li>
                <li>Hasil enkripsi teks (setelah Scytale dan Salsa20)</li>
            </ul>
            Proses ini memastikan bahwa data yang masuk ke database tidak hanya terenkripsi, tetapi juga tidak bisa dibalik tanpa kunci dan nonce yang tepat.
        </p>

        <button
            id="closeDemo"
            class="mt-4 bg-[#3da9fc] text-white px-4 py-2 rounded-md border border-black font-medium hover:bg-[#3295e8] transition"
        >
            Selesai
        </button>
    </div>
</div>
