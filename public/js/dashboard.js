document.addEventListener("DOMContentLoaded", () => {
    const demoButtons = document.querySelectorAll("[data-demo]");
    const demoContainer = document.getElementById("demo-container");
    const demoCard = document.getElementById("demo-card");

    // Buka modal dan load konten
    demoButtons.forEach(btn => {
        btn.addEventListener("click", async () => {
            const demoType = btn.getAttribute("data-demo");
            const response = await fetch(`/crypto-edu/views/demo/${demoType}_demo.php`);
            const content = await response.text();
            demoCard.innerHTML = content;
            demoContainer.classList.remove("hidden");
            demoContainer.classList.add("flex");
            setupLoginDemo(); // panggil fungsi untuk event login demo
        });
    });

    // Tutup modal jika klik area luar
    demoContainer.addEventListener("click", (e) => {
        if (e.target === demoContainer) {
            demoContainer.classList.add("hidden");
            demoContainer.classList.remove("flex");
        }
    });
});

// Fungsi setup langkah-langkah demo login
function setupLoginDemo() {
    const steps = document.querySelectorAll("#login-demo-content .step");
    const showStep = (n) => steps.forEach((s, i) => s.classList.toggle("hidden", i !== n - 1));

    // Step 1 → Enkripsi
    document.getElementById("encryptBtn").onclick = async () => {
        const password = document.getElementById("userPassword").value;
        if (!password) return alert("Masukkan password terlebih dahulu!");
        // simulasi proses hashing (karena scrypt tidak tersedia di JS langsung)
        const salt = crypto.getRandomValues(new Uint8Array(16));
        const enc = new TextEncoder().encode(password);
        const digest = await crypto.subtle.digest("SHA-256", enc);
        const hashHex = Array.from(new Uint8Array(digest)).map(b => b.toString(16).padStart(2, "0")).join("");
        document.getElementById("encryptOutput").textContent = `Hash simulasi (SHA-256): ${hashHex}`;
        showStep(2);
    };

    // Step 2 → Next
    document.getElementById("nextStep").onclick = () => showStep(3);

    // Step 3 → Verifikasi
    document.getElementById("verifyBtn").onclick = () => {
        const input = document.getElementById("verifyPassword").value;
        const resultEl = document.getElementById("verifyResult");
        // simulasi: jika input sama, dianggap valid
        const orig = document.getElementById("userPassword").value;
        if (input === orig) {
            resultEl.textContent = "✅ Password cocok! Login berhasil.";
            resultEl.classList.add("text-green-400");
        } else {
            resultEl.textContent = "❌ Password salah!";
            resultEl.classList.add("text-red-400");
        }
        setTimeout(() => showStep(4), 2000);
    };

    // Step 4 → Close
    document.addEventListener("click", (e) => {
        if (e.target.id === "closeDemo") {
            document.getElementById("demo-container").classList.add("hidden");
        }
    });

    showStep(1);
}
