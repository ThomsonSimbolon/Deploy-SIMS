== Selamat Datang ==

== Aplikasi SIMS Web App ==

=> Requirements

1. Aplikasi SIMS Web App dapat berjalan sesuai dengan kriteria dan keterangan berdasarkan dokumen sebagai pedoman dalam pembuatan aplikasi.
2. Framework yang dapat digunakan:
   ● CodeIgniter 4
3. Library CSS yang dapat digunakan adalah tailwind
4. Menerapkan session management
5. Menerapkan CRUD dengan koneksi database postgresql
6. Menerapkan prepared statement pada query
7. Kriteria CRUD :
   ● Nama produk (Nama harus unik)
   ● Terdapat dropdown kategori produk (Olahraga dan alat musik) pada form add dan
   update, data kategori harus mengambil dari database.
   ● Harga Beli Barang (Validasi angka)
   ● Harga Jual Barang otomatis menghitung 30% dari harga beli (Validasi angka)
   ● Stok Barang (Validasi angka)
   ● Upload Image (Format yang diizinkan hanya JPG dan PNG dengan ukuran maksimal
   100KB )
   ● Terdapat konfirmasi terlebih dahulu sebelum melakukan delete data.
8. Tampilan data produk pada table harus menggunakan pagination, searching dan dropdown kategori (data kategori harus mengambil dari database).
9. Terdapat fitur ekspor excel untuk menampilkan data produk (data yang ditampilkan sesuai dengan hasil pencarian data.

=> Cara Running Aplikasi

1. Terhubung ke Internet.
2. Run Terminal "npx tailwindcss -i ./public/css/tailwind-input.css -o ./public/css/tailwind-output.css --watch" untuk menjalankan library css (Tailwind CSS).
3. Untuk database dapat di import melalui yang sudah tertera di file database atau dapat menjalankan perintah "php spark migrate" untuk database sudah terhubung ke migration
4. "php spark serve".

=> Tools yang digunakan pada saat testing JWT untuk mendapatkan token:

1. Bahasa Pemrograman PHP
2. Bahasa Perograman JavaScript
3. Framework CodeIgniter 4
4. Library CSS yang digunakan Tailwind CSS
5. Postman untuk testing dan mengambil Token
6. Apache

<!-- Xample Json Web Token .env -->

JWT_SECRET=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJzaW1zLWFwcC13ZWIiLCJzdWIiOiI2IiwiaWF0IjoxNzMzNTQ1Mjc5LCJleHAiOjE3MzM1NDg4NzksImVtYWlsIjoic2ltYm9sb250aG9tc29uMTBAZ21haWwuY29tIn0.7FTfQ7oqSZ6XtuHUl0rlNwdfTsodYPh1SppWTXzoy7A

<!-- Email dan Password Test dari Database yang tersedia -->

Email : simbolonthomson10@gmail.com
Password : 1234567

== Selamat Mencoba ==
