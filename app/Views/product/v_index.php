<?= $this->extend('template/layout_product/index'); ?>

<?= $this->section('content-product'); ?>
<h1 class="text-2xl font-bold mb-6">Daftar Produk</h1>
<div class="flex flex-col md:flex-row md:items-center justify-between mb-4">
    <div class="block md:flex justify-between items-center mb-4">
        <div class="relative items-center">
            <input type="text" id="inputSearch" placeholder="Cari..."
                class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
        </div>
        <div class="relative w-1/3 ml-0 md:ml-5">
            <!-- Filter -->
            <select id="filter-select" onchange="filterCategory(this.value)"
                class="w-full pl-9 md:pl-9 px-4 py-2 my-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="Semua" <?= $selectedCategory === 'Semua' || !$selectedCategory ? 'selected' : ''; ?>>
                    Semua
                </option>
                <option value="Alat Olahraga" <?= $selectedCategory === 'Alat Olahraga' ? 'selected' : ''; ?>>Alat
                    Olahraga
                </option>
                <option value="Alat Musik" <?= $selectedCategory === 'Alat Musik' ? 'selected' : ''; ?>>Alat Musik
                </option>
            </select>
            <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-500" stroke="currentColor"
                fill="currentColor" stroke-width="0" viewBox="0 0 256 256" height="1em" width="1em"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M225.6,62.64l-88-48.17a19.91,19.91,0,0,0-19.2,0l-88,48.17A20,20,0,0,0,20,80.19v95.62a20,20,0,0,0,10.4,17.55l88,48.17a19.89,19.89,0,0,0,19.2,0l88-48.17A20,20,0,0,0,236,175.81V80.19A20,20,0,0,0,225.6,62.64ZM128,36.57,200,76,178.57,87.73l-72-39.42Zm0,78.83L56,76,81.56,62l72,39.41ZM44,96.79l72,39.4v76.67L44,173.44Zm96,116.07V136.19l24-13.13V152a12,12,0,0,0,24,0V109.92l24-13.13v76.65Z">
                </path>
            </svg>
        </div>

    </div>
    <div class="mt-4 md:mt-0 md:flex md:items-center">
        <a href="<?= base_url('product/export-excel'); ?>"
            class="btn-addExs bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 w-full md:w-auto mb-2 md:mb-0 md:mx-2 mx-0">
            <img src="<?= base_url('Assets/package.png'); ?>" alt="">
            <span class="ml-2">Export Excel</span>
        </a>
        <a href="<?= base_url('product/create'); ?>"
            class="btn-addExs bg-red text-white px-4 py-2 rounded hover:bg-red-600 w-full md:w-auto">
            <i class='bx bx-plus-circle'></i>
            <span class="ml-2">Tambah Produk</span>
        </a>
    </div>
</div>
<div class="bg-white border border-gray-300 rounded-lg overflow-hidden">
    <div class="overflow-x-auto">
        <!-- Table -->
        <table class="min-w-full bg-white font-normal">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-2 px-4 text-left">No</th>
                    <th class="py-2 px-4 text-left">Image</th>
                    <th class="py-2 px-4 text-left">Nama Produk</th>
                    <th class="py-2 px-4 text-left">Kategori Produk</th>
                    <th class="py-2 px-4 text-left">Harga Beli (Rp)</th>
                    <th class="py-2 px-4 text-left">Harga Jual (Rp)</th>
                    <th class="py-2 px-4 text-left">Stok Produk</th>
                    <th class="py-2 px-4 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($product)): ?>
                    <!-- Menampilkan pesan jika data kosong -->
                    <tr>
                        <td colspan="8" class="py-2 px-4 text-center text-gray-500">
                            Data produk tidak ditemukan.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php $no = 1; ?>
                    <?php foreach ($product as $p): ?>
                        <tr>
                            <td class="py-2 px-4"><?= $no++; ?></td>
                            <td class="py-2 px-4">
                                <img src="<?= base_url('uploads/product/' . $p->image); ?>" alt="Produk"
                                    class="w-10 h-auto object-cover">
                            </td>
                            <td class="py-2 px-4"><?= esc($p->name_product); ?></td>
                            <td class="py-2 px-4"><?= esc($p->category_product); ?></td>
                            <td class="py-2 px-4"><?= number_format((float)$p->buy_price, 0, ',', ','); ?></td>
                            <td class="py-2 px-4"><?= number_format((float)$p->sell_price, 0, ',', ','); ?></td>
                            <td class="py-2 px-4"><?= esc($p->stock); ?></td>
                            <td class="py-2 px-4">
                                <a href="<?= site_url('product/edit/' . $p->id); ?>"><i
                                        class="fas fa-edit text-blue-500 cursor-pointer"></i></a>
                                <a href="javascript:void(0);"
                                    onclick="confirmDelete('<?= site_url('product/delete/' . $p->id); ?>')"><i
                                        class="fas fa-trash text-red-500 cursor-pointer ml-2"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>

    </div>
</div>

<!-- Pagination -->
<?= $pager->links('product', 'product_pagination') ?>

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


<?= $this->endSection(); ?>