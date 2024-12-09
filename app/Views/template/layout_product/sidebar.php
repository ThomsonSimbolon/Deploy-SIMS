<div class="p-4 flex items-center justify-between">
    <div class="flex items-center" id="sidebar-title">
        <i class='bx bx-shopping-bag text-white text-2xl mr-2'></i>
        <span class="text-md font-bold">SIMS Web App</span>
    </div>
    <!-- Sidebar Toggle Button -->
    <button id="sidebarToggle" class="bx bx-menu-alt-left text-white text-2xl hover:cursor-pointer"></button>
</div>
<nav class="mt-10" id="menuItems">
    <a href="<?= base_url('product'); ?>"
        class="flex items-center py-2.5 px-4 transition duration-200 <?= uri_string() == 'product' ? 'bg-red-400 text-white' : 'hover:bg-red-700'; ?>">
        <img src="<?= base_url('Assets/package.png'); ?>" alt="Produk" class="w-6 h-6">
        <span class="ml-2">Produk</span>
    </a>
    <a href="<?= base_url('profile'); ?>"
        class="flex items-center py-2.5 px-4 transition duration-200 <?= uri_string() == 'profile' ? 'bg-red-400 text-white' : 'hover:bg-red-700'; ?>">
        <img src="<?= base_url('Assets/User.png'); ?>" alt="Profil" class="w-6 h-6">
        <span class="ml-2">Profil</span>
    </a>
    <a href="<?= base_url('logout'); ?>"
        class="flex items-center py-2.5 px-4 transition duration-200 <?= uri_string() == 'logout' ? 'bg-red-400 text-white' : 'hover:bg-red-700'; ?>">
        <img src="<?= base_url('Assets/SignOut.png'); ?>" alt="Logout" class="w-6 h-6">
        <span class="ml-2">Logout</span>
    </a>
</nav>