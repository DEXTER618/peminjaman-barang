# DOKUMENTASI MINI PROJECT SIMLAB-RPL

## 1. Deskripsi Proyek
SIMLAB-RPL merupakan aplikasi berbasis web menggunakan Laravel untuk mengelola inventaris laboratorium Rekayasa Perangkat Lunak (RPL).

## 2. Tujuan
- Mengelola data inventaris laboratorium.
- Menambahkan, melihat, mengubah, dan menghapus data barang.
- Menampilkan status dan jumlah barang.
- Memvalidasi data sebelum disimpan.

## 3. Teknologi yang Digunakan
- Laravel
- PHP
- MySQL
- Blade Template
- HTML dan CSS
- Git

## 4. Fitur Aplikasi
- Dashboard inventaris.
- Menampilkan daftar barang.
- Pencarian barang berdasarkan kode atau nama.
- Menambahkan barang.
- Mengubah data barang.
- Menghapus barang.
- Validasi input.
- Menampilkan status barang.

## 5. Struktur Database

### Tabel kategoris
- id
- nama_kategori
- deskripsi
- created_at
- updated_at

### Tabel barangs
- id
- kategori_id
- kode_barang
- nama_barang
- spesifikasi
- stok
- kondisi
- status
- created_at
- updated_at

Relasi: Satu kategori dapat memiliki banyak barang (one-to-many).

## 6. Catatan Pengembangan
Aplikasi dikembangkan menggunakan Laravel dengan database MySQL. Pengelolaan struktur database dilakukan melalui migration, sedangkan pengolahan data menggunakan Eloquent ORM.

## 7. Pseudocode Proses Tambah Barang

MULAI

1. Pengguna membuka halaman tambah barang.
2. Sistem menampilkan formulir barang.
3. Pengguna mengisi data barang.
4. Pengguna menekan tombol Simpan.
5. Sistem memvalidasi data.
6. Jika data tidak valid, sistem menampilkan pesan kesalahan.
7. Jika data valid, sistem menyimpan barang ke database.
8. Sistem menampilkan pesan bahwa barang berhasil ditambahkan.
9. Sistem mengarahkan pengguna ke halaman daftar barang.

SELESAI

## 8. Test Case (Pengujian Aplikasi)

| No. | Skenario Pengujian | Data Uji | Hasil yang Diharapkan |
|---|---|---|---|
| 1 | Menambah barang dengan data valid | Semua data diisi dengan benar | Barang berhasil disimpan |
| 2 | Menambah barang tanpa mengisi kode barang | Kode barang kosong | Sistem menampilkan pesan validasi |
| 3 | Memasukkan stok negatif | Stok = -5 | Sistem menolak data |
| 4 | Memasukkan kode barang duplikat | Kode barang yang sudah digunakan | Sistem menolak data |
| 5 | Mengubah status barang | Status = Dipinjam | Badge status berubah sesuai status |
| 6 | Mengakses aplikasi melalui HP | Lebar layar 375 px | Tampilan dapat digunakan dan tabel bisa digulir secara horizontal |

## 9. Jurnal Troubleshooting

| No. | Masalah | Penyebab | Solusi |
|---|---|---|---|
| 1 | Koneksi database gagal | Konfigurasi database belum sesuai | Memeriksa konfigurasi database pada file .env |
| 2 | Driver MySQL tidak tersedia | Ekstensi pdo_mysql belum aktif | Mengaktifkan ekstensi pdo_mysql pada php.ini |
| 3 | Relasi kategori bermasalah | Relasi tabel belum sesuai | Memeriksa foreign key dan relasi Eloquent |
| 4 | Data barang tidak tampil sesuai kebutuhan | Query dan relasi perlu diperiksa | Menggunakan Eloquent ORM dan relasi kategori |
| 5 | Tampilan dashboard belum sesuai | Tampilan perlu disesuaikan | Memperbaiki struktur Blade dan CSS |

## 10. Version Control

Pengelolaan versi proyek menggunakan Git dan GitHub.

Repository GitHub:
https://github.com/DEXTER618/peminjaman-barang

Commit digunakan untuk menyimpan riwayat perubahan kode. Perintah yang digunakan antara lain:

- `git status` untuk memeriksa status perubahan.
- `git add .` untuk memasukkan perubahan ke staging area.
- `git commit -m "pesan"` untuk menyimpan perubahan ke riwayat Git.
- `git push` untuk mengirim perubahan ke GitHub.

## 11. Cara Menjalankan Aplikasi

1. Buka terminal pada folder proyek.
2. Pastikan konfigurasi database pada file `.env` sudah benar.
3. Jalankan server Laravel menggunakan:

   `php artisan serve`

4. Buka alamat berikut pada browser:

   `http://127.0.0.1:8000`

5. Dashboard SIMLAB-RPL akan ditampilkan.

## 12. Kesimpulan

SIMLAB-RPL merupakan aplikasi inventaris laboratorium berbasis Laravel yang menyediakan fitur pengelolaan data barang, pencarian, validasi, kategori, dan dashboard statistik.

Pengujian dilakukan untuk memastikan fitur utama berjalan sesuai kebutuhan. Git dan GitHub digunakan untuk mengelola serta menyimpan riwayat perubahan proyek.