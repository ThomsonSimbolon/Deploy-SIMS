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
                    <i class='bx bx-shopping-bag txt-red text-2xl'></i>
                    <h1 class="text-2xl font-semibold ml-2">SIMS Web App</h1>
                </div>
                <h1 class="text-2xl font-bold mb-8">Daftar untuk membuat akun baru</h1>

                <!-- Menampilkan Flash Data -->
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger mb-4 text-red-500">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success mb-4 text-green-500">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>

                <!-- <?php $validation = \Config\Services::validation(); ?> -->

                <!-- Form Register -->
                <form action="<?= base_url('auth/register/store'); ?>" method="post" class="w-full max-w-sm mx-auto">
                    <?= csrf_field(); ?>
                    <div class="mb-5">
                        <div class="relative flex items-center">
                            <input
                                class="w-full px-9 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                placeholder="Masukkan nama lengkap" name="name" type="text" value="<?= old('name'); ?>"
                                required>
                            <i class="fas fa-user absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-300"></i>
                        </div>
                        <?php if ($validation->hasError('name')): ?>
                            <div class="text-red-500 text-sm"><?= $validation->getError('name'); ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-5">
                        <div class="relative flex items-center">
                            <input
                                class="w-full px-9 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                placeholder="Masukkan posisi" name="position" type="text"
                                value="<?= old('position'); ?>" required>
                            <i
                                class="fas fa-briefcase absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-300"></i>
                        </div>
                        <?php if ($validation->hasError('position')): ?>
                            <div class="text-red-500 text-sm"><?= $validation->getError('position'); ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-5">
                        <div class="relative flex items-center">
                            <input
                                class="w-full px-9 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                placeholder="Masukkan email anda" name="email" type="email" value="<?= old('email'); ?>"
                                required>
                            <i class="fas fa-at absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-300"></i>
                        </div>
                        <?php if ($validation->hasError('email')): ?>
                            <div class="text-red-500 text-sm"><?= $validation->getError('email'); ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-5">
                        <div class="relative">
                            <input id="passwordInput"
                                class="w-full px-9 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                placeholder="Masukkan password anda" name="password" type="password" required>
                            <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-300"></i>
                        </div>
                        <?php if ($validation->hasError('password')): ?>
                            <div class="text-red-500 text-sm"><?= $validation->getError('password'); ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-5">
                        <div class="relative">
                            <input id="passwordConfirmInput"
                                class="w-full px-9 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500"
                                placeholder="Konfirmasi password" name="password_confirm" type="password" required>
                            <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-300"></i>
                        </div>
                        <?php if ($validation->hasError('password_confirm')): ?>
                            <div class="text-red-500 text-sm"><?= $validation->getError('password_confirm'); ?></div>
                        <?php endif; ?>
                    </div>

                    <button
                        class="w-full bg-red text-white py-2 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500">Daftar</button>
                </form>

                <div class="mt-4 text-center">
                    <p class="text-gray-600">Sudah memiliki akun? <a href="<?= base_url('/login'); ?>"
                            class="text-blue-600 hover:text-blue-700">Masuk</a></p>
                </div>
            </div>
        </div>

        <!-- Right Side -->
        <div class="hidden md:flex w-full md:w-1/2 justify-center items-center"
            style="background-image: url('/Assets/Frame 98699.png'); background-position: center; background-size: cover; background-repeat: no-repeat;">
        </div>
    </div>

    <script src="<?= base_url('js/index.js'); ?>"></script>
</body>

</html>