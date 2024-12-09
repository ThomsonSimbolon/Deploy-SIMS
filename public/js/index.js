// Fungsi untuk form login input password
document.addEventListener("DOMContentLoaded", function () {
  const passwordInput = document.getElementById("passwordInput");
  const togglePassword = document.getElementById("togglePassword");

  // Menampilkan ikon mata hanya jika ada input
  passwordInput.addEventListener("input", function () {
    if (passwordInput.value) {
      togglePassword.style.display = "block";
    } else {
      togglePassword.style.display = "none";
    }
  });

  // Toggle password
  togglePassword.addEventListener("click", function () {
    const type =
      passwordInput.getAttribute("type") === "password" ? "text" : "password";
    passwordInput.setAttribute("type", type);
    this.classList.toggle("fa-eye");
    this.classList.toggle("fa-eye-slash");
  });

  // Sembunyikan ikon mata
  togglePassword.style.display = "none";
});

// Proses upload gambar
function previewUploadedImage(event) {
  const input = event.target;
  const reader = new FileReader();

  reader.onload = function (e) {
    // Menampilkan gambar di area preview
    const previewImage = document.getElementById("preview-image");
    previewImage.src = e.target.result;
  };

  // Validasi apakah file ada
  if (input.files && input.files[0]) {
    reader.readAsDataURL(input.files[0]);
  }
}

// Search data
document.getElementById("inputSearch").addEventListener("input", function () {
  const searchQuery = this.value.toLowerCase();
  const rows = document.querySelectorAll("table tbody tr");

  rows.forEach((row) => {
    const productName = row.cells[2].textContent.toLowerCase();
    if (productName.includes(searchQuery)) {
      row.style.display = "";
    } else {
      row.style.display = "none";
    }
  });
});

// Filter
document
  .getElementById("filter-select")
  .addEventListener("change", function () {
    const selectedCategory = this.value;
    const url = new URL(window.location.href);
    url.searchParams.set("category", selectedCategory);
    window.location.href = url;
  });

// Confirm Delete
function confirmDelete(url) {
  if (confirm("Apakah Anda yakin ingin menghapus produk ini?")) {
    window.location.href = url;
  }
}
