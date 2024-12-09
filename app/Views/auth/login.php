<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= base_url('css/tailwind-output.css') ?>" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
    <title>SIMS App Web</title>
</head>

<body class="h-screen flex">
    <div class="flex flex-col md:flex-row w-full">
        <!-- Left Side -->
        <div class="flex flex-col justify-center items-center w-full md:w-1/2 bg-white p-2 my-auto">
            <div
                class="w-full text-center md:border-0 border px-3 md:rounded-none rounded-lg md:shadow-none py-5 shadow-lg">
                <div class="flex items-center justify-center mb-4">
                    <i class='bx bx-shopping-bag txt-red text-3xl'></i>
                    <h1 class="text-2xl font-semibold ml-2">SIMS Web App</h1>
                </div>
                <h1 class="text-2xl font-bold mb-8">Masuk atau buat akun<br /> untuk memulai</h1>
                <form class="w-full max-w-sm mx-auto" method="post" action="<?= base_url('login/loggedIn'); ?>">
                    <?= csrf_field(); ?>

                    <!-- Menampilkan pesan error jika ada -->
                    <?php if (session()->getFlashdata('errors')): ?>
                        <div class="bg-red-500 text-red-500 p-4 rounded mb-4">
                            <ul>
                                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                    <li><?= esc($error); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <div class="mb-5">
                        <div class="relative flex items-center">
                            <input type="email" name="email"
                                class="w-full px-9 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                placeholder="Masukan email anda">
                            <i class="fas fa-at absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-300"></i>
                        </div>
                    </div>
                    <div class="mb-5">
                        <div class="relative">
                            <input id="passwordInput" name="password"
                                class="w-full px-9 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                placeholder="Masukan password anda" type="password">
                            <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-300"></i>
                            <i id="togglePassword"
                                class="fas fa-eye absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-300"></i>
                        </div>
                    </div>
                    <button type="submit"
                        class="w-full bg-red text-white py-2 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500">Masuk</button>
                </form>

                <div class="mt-4 text-center">
                    <p class="text-gray-600">Belum memiliki akun? <a href="<?= base_url('/register'); ?>"
                            class="text-blue-600 hover:text-blue-700">Daftar</a></p>
                </div>
            </div>
        </div>
        <!-- Right Side -->
        <div class="hidden md:flex w-full md:w-1/2 justify-center items-center"
            style="background-image: url('/Assets/Frame 98699.png'); background-position: center; background-size: cover; background-repeat: no-repeat;">
            <!-- <img alt="Frame 98699" src="<?= base_url('/Assets/Frame 98699.png'); ?>" class="max-h-full" /> -->
        </div>
    </div>

    <script src="<?= base_url('js/index.js'); ?>"></script>
</body>

</html>