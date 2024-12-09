<?= $this->extend('template/layout_product/index'); ?>

<?= $this->section('content-product'); ?>
<div class="text-gray-700">
    <nav class="flex px-8" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-2 md:space-x-2">
            <?php foreach ($breadcrumbs as $key => $link) : ?>
                <?php if ($key === 'Active Page') : ?>
                    <li>
                        <div class="flex items-center">
                            <span class="text-sm font-bold text-black"><?= esc($link) ?></span>
                        </div>
                    </li>
                <?php else : ?>
                    <li>
                        <div class="flex items-center">
                            <a href="<?= esc($link) ?>"
                                class="text-sm font-medium text-gray-400 hover:text-gray-900"><?= esc($key) ?></a>

                            <span class="ml-2">></span>
                        </div>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ol>
    </nav>
</div>

<!-- Form -->
<form action="<?= site_url('product/update/' . $product->id); ?>" class="p-8" method="post"
    enctype="multipart/form-data">
    <?php if (session()->getFlashdata('errors')): ?>
        <div class="bg-red-100 text-red-600 p-4 rounded mb-4">
            <ul>
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= esc($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="grid grid-cols-2 gap-4 mb-4">
        <input type="hidden" id="id" name="id">
        <div>
            <label for="category_product" class="block text-gray-700 mb-1 md:mb-2">Kategori</label>
            <select id="category_product" name="category_product"
                class="w-full p-2 border border-gray-300 rounded bg-gray-100 text-gray-400">
                <option value="">Pilih kategori</option>
                <option value="Alat Olahraga" <?= $product->category_product === 'Alat Olahraga' ? 'selected' : ''; ?>>
                    Alat Olahraga</option>
                <option value="Alat Musik" <?= $product->category_product === 'Alat Musik' ? 'selected' : ''; ?>>Alat
                    Musik</option>
            </select>
        </div>
        <div>
            <label for="name_product" class="block text-gray-700 mb-1 md:mb-2">Nama Barang</label>
            <input type="text" id="name_product" name="name_product"
                class="w-full p-2 border bg-gray-100 border-gray-300 rounded"
                value="<?= old('name_product', $product->name_product); ?>" placeholder="Masukan nama barang" />
        </div>
    </div>
    <div class="grid grid-cols-3 gap-4 mb-4">
        <div>
            <label for="buy_price" class="block text-gray-700 mb-1 md:mb-2">Harga Beli</label>
            <input type="text" id="buy_price" name="buy_price"
                class="w-full p-2 bg-gray-100 border border-gray-300 rounded" value="<?= $product->buy_price; ?>" />
        </div>
        <div>
            <label for="sell_price" class="block text-gray-700 mb-1 md:mb-2">Harga Jual*</label>
            <input type="text" id="sell_price" name="sell_price"
                class="w-full p-2 bg-gray-100 border border-gray-300 rounded" value="<?= $product->sell_price; ?>" />
        </div>
        <div>
            <label for="stock" class="block text-gray-700 mb-1 md:mb-2">Stok Barang</label>
            <input type="text" id="stock" name="stock" class="w-full p-2 bg-gray-100 border border-gray-300 rounded"
                placeholder="Masukan jumlah stok barang" value=<?= old('stock', $product->stock); ?>>
        </div>
    </div>
    <div>
        <div class="mb-4">
            <label class="block text-gray-700 mb-1 md:mb-2">Upload Image</label>
            <div class="border-2 border-dashed border-blue-500 p-8 flex justify-center items-center">
                <div class="flex flex-col items-center justify-center">
                    <!-- Area untuk menampilkan gambar yang diupload -->
                    <label for="upload-image" class="block text-gray-700 mb-1 md:mb-2 cursor-pointer">
                        <img id="preview-image" src="<?= base_url('uploads/product/' . $product->image); ?>"
                            alt="Preview Image" class="w-32 h-32 object-cover mb-4" />
                    </label>
                    <!-- Input file -->
                    <label for="upload-image" class="text-blue-500 cursor-pointer">
                        <input type="file" name="image" id="upload-image" class="hidden" accept="image/*"
                            onchange="previewUploadedImage(event)">
                        Klik untuk unggah gambar
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-end px-8">
        <button class="bg-white text-blue-500 border border-blue-500 px-4 py-2 rounded mr-2">
            Batalkan
        </button>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded">
            Simpan
        </button>
    </div>
</form>

<?= $this->endSection(); ?>