<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Crypto Edu</title>
    <!-- quick dev using CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script defer src="/crypto-edu/public/js/dashboard.js"></script>

</head>
<body class="bg-gray-100 text-gray-800">
 <!-- Navbar -->
    <nav class="flex justify-between items-center px-8 py-4 bg-[#14213D] shadow-md">
        <a href="<?= BASEURL ?>" class="text-lg font-semibold tracking-wide text-[#F8F8F8] hover:text-[#FCA311] transition">
            CryptoEdu
        </a>
        <div class="flex items-center gap-4">
            <?php if (session_status() === PHP_SESSION_ACTIVE && !empty($_SESSION['user'])): ?>
                <span class="text-sm text-[#F8F8F8]">Hi, <span class="font-semibold"><?= htmlspecialchars($_SESSION['user']) ?></span></span>
                <a href="<?= BASEURL ?>/Auth/logout" class="text-[#FCA311] hover:underline">Logout</a>
            <?php else: ?>
                <a href="<?= BASEURL ?>/Auth/login" class="text-[#FCA311] hover:underline">Login</a>
                <a href="<?= BASEURL ?>/Auth/register" class="text-[#FCA311] hover:underline">Register</a>
            <?php endif; ?>
        </div>
    </nav>
<main class="container mx-auto mt-8 px-4">