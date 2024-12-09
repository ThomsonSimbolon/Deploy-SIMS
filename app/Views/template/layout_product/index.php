<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- TailwindCSS CSS External -->
    <link href="<?= base_url('css/tailwind-output.css') ?>" rel="stylesheet">

    <!-- Link FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />

    <!-- Link Box Icon -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    <!-- Link CSS External -->
    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
    <title><?= $title; ?></title>
</head>

<body class="bg-white">
    <div class="flex flex-col md:flex-row">
        <!-- Sidebar -->
        <div class="w-full md:w-64 bg-red min-h-screen text-white sidebar transition-all duration-250" id="sidebar">
            <?= $this->include('template/layout_product/sidebar'); ?>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <?= $this->renderSection('content-product'); ?>
        </div>
    </div>

    <!-- Javascript External -->
    <script src="<?= base_url('js/index.js'); ?>"></script>

    <!-- Script External Urgent -->
    <script>
        // Fungs untuk Sidebar-Toggle
        const sidebar = document.getElementById("sidebar");
        const sidebarToggle = document.getElementById("sidebarToggle");
        const sidebarTitle = document.getElementById("sidebar-title");
        const menuItems = document.getElementById("menuItems");

        sidebarToggle.addEventListener("click", () => {
            if (sidebar.classList.contains("md:w-64")) {
                sidebar.classList.remove("md:w-64");
                sidebar.classList.add("md:w-16");

                sidebarTitle.classList.add("hidden");
                menuItems
                    .querySelectorAll("span")
                    .forEach((span) => span.classList.add("hidden"));
            } else {
                sidebar.classList.remove("md:w-16");
                sidebar.classList.add("md:w-64");
                sidebarTitle.classList.remove("hidden");
                menuItems
                    .querySelectorAll("span")
                    .forEach((span) => span.classList.remove("hidden"));
            }
        });
    </script>


    <!-- Link CDN TailwindCSS -->
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->

</body>

</html>