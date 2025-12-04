# TP10DPBO2425C1
Saya Hawa Dwiafina Azahra dengan NIM 2400336 mengerjakan Tugas Praktikum 10 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

# Desain Program
Program ini dibangun menggunakan pola Model-View-ViewModel (MVVM). Gampangnya, pola ini memisahkan program menjadi tiga bagian utama agar kode lebih rapi, mudah dikelola, dan gampang dites.

## 1. Model
Bagian ini bertanggung jawab penuh atas semua urusan data. Mulai dari mengambil data dari database, menyimpan data baru, mengubah data yang sudah ada, sampai menghapus data.
Contoh di proyek ini:
- `models/User.php` - Mengurus semua data yang berhubungan dengan user/pengguna
- `models/Event.php` - Mengurus semua data yang berhubungan dengan event
- `models/Kategori_event.php` - Mengurus semua data yang berhubungan dengan kategori event
- `models/Tiket.php` - Mengurus semua data yang berhubungan dengan tiket

## 2. View
Bagian ini fokus untuk menampilkan data ke pengguna. Isinya cuma kode untuk presentasi, seperti HTML untuk menampilkan tabel atau formulir. View sama sekali tidak tahu-menahu tentang logika bisnis atau database.
Contoh di proyek ini:
- `views/user_list.php` - Menyiapkan tampilan untuk daftar user
- `views/user_form.php` - Menyiapkan tampilan untuk formulir tambah/edit user
- `views/event_list.php` - Menyiapkan tampilan untuk daftar event
- `views/event_form.php` - Menyiapkan tampilan untuk formulir tambah/edit event
- `views/template/` - Folder ini berisi file header dan footer yang menjadi "kulit" atau template tampilan

## 3. ViewModel
Ini adalah "otak" dari aplikasi. ViewModel bertindak sebagai jembatan antara Model dan View. Ketika pengguna melakukan sesuatu (misalnya, klik tombol "tambah"), View akan memberitahu ViewModel. Lalu, ViewModel akan memerintahkan Model untuk menyimpan data. Setelah itu, ViewModel meminta data terbaru dari Model dan menampilkannya ke pengguna melalui View.
Contoh di proyek ini:
- `viewmodels/UserViewModel.php` - Mengatur logika untuk semua yang berhubungan dengan user
- `viewmodels/EventViewModel.php` - Mengatur logika untuk semua yang berhubungan dengan event
- `viewmodels/KategoriViewModel.php` - Mengatur logika untuk semua yang berhubungan dengan kategori
- `viewmodels/TiketViewModel.php` - Mengatur logika untuk semua yang berhubungan dengan tiket

## 4. Controller
Controller adalah "pintu masuknya" program. Ketika user buka link atau klik tombol, request akan datang ke sini. Controller yang atur ViewModel mana yang dipanggil dan View mana yang ditampilkan.
Contoh di proyek ini:
- `index.php` - File ini yang menjadi pintu masuk utama program

# Alur Program

Berikut adalah alur kerja aplikasi, baik untuk data user, event, kategori, maupun tiket. Prosesnya hampir sama untuk semuanya.

## 1. Menampilkan Daftar Data (Contoh: User)

**Permintaan Awal:** Pengguna membuka atau klik link `index.php?entity=user&action=list` di browser.
**Controller Menangkap:** `index.php` menangkap permintaan ini dan membaca parameter URL-nya (entity=user, action=list).
**Controller Buat ViewModel:** index.php membuat objek `UserViewModel`.
**ViewModel Panggil Model:** ViewModel memanggil method `getAll()` dari class Model User.
**Model Query Database:** Model menjalankan query ke database untuk mendapatkan semua data user.
**Data Kembali ke ViewModel:** Model mengembalikan data ke ViewModel.
**ViewModel Siap Data:** ViewModel memproses data tersebut jika perlu dan siap memberikannya ke View.
**Load View:** index.php memanggil file View `views/user_list.php`.
**View Render HTML:** View mengambil data dari ViewModel, memasukkannya ke dalam HTML, dan menghasilkan halaman web.
**Tampil ke Pengguna:** Halaman web yang berisi daftar user ditampilkan di browser pengguna.

## 2. Menambah Data Baru

**Pengguna Klik "Tambah":** Pengguna mengklik tombol atau link untuk menambah data baru.
**Controller Menampilkan Form:** index.php mendeteksi permintaan ini (action=add) dan memanggil ViewModel untuk menampilkan formulir.
**ViewModel Minta View:** ViewModel meminta View untuk merender HTML formulir kosong.
**Form Tampil:** Browser menampilkan formulir kosong untuk user isi.
**Pengguna Isi dan Simpan:** Pengguna mengisi data di formulir dan tekan tombol "Simpan".
**Data Dikirim ke Server:** Data dari formulir dikirim kembali ke index.php dalam bentuk POST request.
**ViewModel Menyimpan:** index.php menangkap data ini dan memberikannya ke ViewModel. ViewModel kemudian memerintahkan Model untuk menyimpan data baru.
**Model Simpan ke Database:** Model menjalankan query INSERT untuk menambahkan data baru ke database.
**Selesai:** Setelah data berhasil disimpan, halaman akan dialihkan kembali ke halaman daftar utama, di mana data yang baru ditambahkan sudah muncul.

## 3. Mengubah Data

Alurnya sangat mirip dengan menambah data, perbedaannya:
**Saat pengguna mengklik "Edit":** index.php mendeteksi (action=edit) dan meminta ViewModel untuk menampilkan formulir, tetapi kali ini dengan data yang sudah ada.
**ViewModel Panggil Model:** ViewModel meminta Model untuk mengambil data spesifik berdasarkan ID dengan method `getById()`.
**Data Ditampilkan:** Data tersebut ditampilkan di formulir oleh View, sehingga user bisa lihat dan ubah data lama.
**User Ubah dan Simpan:** Saat pengguna menyimpan perubahan, ViewModel akan memerintahkan Model untuk menjalankan query UPDATE bukan INSERT.
**Data Terupdate:** Data di database berubah dan halaman kembali ke daftar.

## 4. Menghapus Data

**Pengguna Klik "Hapus":** Pengguna mengklik tombol hapus pada salah satu baris data.
**Permintaan Dikirim:** Sebuah permintaan dikirim ke index.php dengan ID data yang akan dihapus (action=delete&id=5).
**ViewModel Diberi Perintah:** index.php memberitahu ViewModel untuk menghapus data dengan ID tersebut.
**Model Hapus Data:** ViewModel memerintahkan Model untuk menjalankan query DELETE di database menggunakan ID yang diberikan.
**Selesai:** Setelah data terhapus, halaman dialihkan kembali ke daftar utama.

#DOKUMENTASI
![USER](dokuemntasi/USER.mp4)


![TIKET](dokuemntasi/TIKET.mp4)


![EVENT](dokuemntasi/EVENT.mp4)


![KATEGORI_EVENT](dokuemntasi/KATEGORI_EVENT.mp4)
