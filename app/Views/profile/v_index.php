<?= $this->extend('template/layout_product/index'); ?>

<?= $this->section('content-product'); ?>

<!-- Main Content -->
<div class="flex-1 p-8">
    <div class="flex flex-col mb-8">
        <div class="relative">
            <img alt="Profile" class="rounded-full w-26 shadow h-26 mr-4" height="100"
                src="<?= base_url('/Assets/Frame 98700.png'); ?>" width="100" />
            <button id="editProfile"><i
                    class="bx bx-pencil absolute ring-1 left-20 hover:bg-slate-300 bg-white top-16 transform -translate-y-1/5 ring-gray-300 p-1 rounded-full"></i></button>
        </div>
        <div>
            <h1 class="text-2xl font-bold">
                <?= $user->name; ?>
            </h1>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-gray-700 mb-2">
                Nama Kandidat
            </label>
            <div class="flex items-center border border-gray-300 p-2 rounded px-4">
                <i class="fas fa-at mr-2">
                </i>
                <?= $user->name; ?>
            </div>
        </div>
        <div>
            <label class="block text-gray-700 mb-2">
                Posisi Kandidat
            </label>
            <div class="flex items-center border border-gray-300 p-2 rounded px-4">
                <i class="fas fa-code mr-2">
                </i>
                <?= $user->position; ?>
            </div>
        </div>
    </div>
</div>

<!-- Pop-up Modal -->
<div id="profileModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center">
    <div class="bg-white p-6 rounded-lg w-1/2">
        <h2 class="text-lg font-bold mb-4">Update Profil</h2>
        <form action="<?= base_url('profile/update/' . $user->id); ?>" method="post">
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Nama Kandidat</label>
                <input type="text" id="name" name="name" value="<?= $user->name; ?>"
                    class="w-full border border-gray-300 p-2 rounded mt-1">
            </div>
            <div class="mb-4">
                <label for="position" class="block text-gray-700">Posisi Kandidat</label>
                <input type="text" id="position" name="position" value="<?= $user->position; ?>"
                    class="w-full border border-gray-300 p-2 rounded mt-1">
            </div>
            <div class="flex justify-end">
                <button type="button" id="closeModal"
                    class="mr-2 px-4 py-2  rounded text-blue-500 border border-blue-500 ">Batal</button>
                <button type="submit" class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Script External Urgent -->
<script>
    // Logika untuk membuka dan menutup modal
    const editProfileBtn = document.getElementById("editProfile");
    const profileModal = document.getElementById("profileModal");
    const closeModalBtn = document.getElementById("closeModal");

    editProfileBtn.addEventListener("click", () => {
        profileModal.classList.remove("hidden");
    });

    closeModalBtn.addEventListener("click", () => {
        profileModal.classList.add("hidden");
    });
</script>

<?= $this->endSection(); ?>