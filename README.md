# 📌 Daily Project 7 - Sistem Peminjaman Ruangan

## 📖 Deskripsi

Project ini merupakan pengembangan dari **Daily Project 6**, yaitu implementasi sistem peminjaman ruangan berbasis web.
Aplikasi ini memungkinkan pengguna untuk melakukan peminjaman ruangan secara sederhana tanpa menggunakan database (data disimpan secara manual dalam kode dan session).

---

## 🚀 Fitur Utama

* 🧑‍💼 Role sederhana (Admin & User)
* 🏫 Peminjaman ruangan
* 📄 Riwayat peminjaman
* ❌ Cancel peminjaman

---

## 👤 Akun Login

Gunakan akun berikut:

| Role  | Email                                     | Password |
| ----- | ----------------------------------------- | -------- |
| Admin | [admin@gmail.com](mailto:admin@gmail.com) | 123456   |

---

## 🛠️ Teknologi yang Digunakan

* Laravel 10
* PHP 8
* Blade Template
* Session (tanpa database)
* Ngrok (untuk publish)

---

## 📂 Source Code

🔗 Github Repository:
👉 https://github.com/FlavaaXFLOWW/peminjaman-ruangan

---

## 🌐 Live Demo (Publish Web)

🔗 Akses aplikasi:
👉 [https://xxxx.ngrok-free.dev](https://staglike-cinderella-compactly.ngrok-free.dev/login)

> ⚠️ Catatan: Link dapat berubah karena menggunakan ngrok.

---

## ⚙️ Cara Menjalankan Project

### 1. Clone Repository

```bash
git clone https://github.com/USERNAME/peminjaman-ruangan.git
cd peminjaman-ruangan
```

### 2. Install Dependency

```bash
composer install
```

### 3. Copy File Environment

```bash
cp .env.example .env
```

### 4. Generate Key

```bash
php artisan key:generate
```

### 5. Jalankan Server

```bash
php artisan serve
```

### 6. Jalankan Ngrok

```bash
ngrok http 8000
```

---

## 🧪 Pengujian Aplikasi

Pengujian dilakukan berdasarkan aspek kualitas sistem yang telah ditentukan pada Daily Project 6.

| No | Fitur             | Skenario Pengujian           | Hasil yang Diharapkan | Hasil Aktual             | Status  |
| -- | ----------------- | ---------------------------- | --------------------- | ------------------------ | ------- |
| 1  | Login             | Input email & password benar | Masuk ke dashboard    | Berhasil masuk dashboard | ✅ Lulus |
| 2  | Login             | Input password salah         | Muncul error          | Error tampil             | ✅ Lulus |
| 3  | Dashboard         | Akses setelah login          | Dashboard tampil      | Dashboard tampil         | ✅ Lulus |
| 4  | Booking           | Isi form peminjaman          | Data tersimpan        | Data tampil di riwayat   | ✅ Lulus |
| 5  | Booking           | Klik cancel                  | Status berubah        | Status berubah           | ✅ Lulus |
| 6  | Akses tanpa login | Buka /dashboard              | Redirect ke login     | Redirect berhasil        | ✅ Lulus |
| 7  | UI                | Navigasi menu                | Menu dapat diakses    | Berfungsi normal         | ✅ Lulus |
| 8  | Session           | Logout                       | Kembali ke login      | Berhasil logout          | ✅ Lulus |

---

## ⚠️ Keterbatasan Sistem

* Tidak menggunakan database (data tidak tersimpan permanen)
* Data akan hilang saat server restart
* Belum ada validasi kompleks
* Belum ada keamanan tingkat lanjut

---

## 📈 Pengembangan Selanjutnya

* Integrasi database (MySQL / MongoDB)
* Sistem autentikasi Laravel (Auth)
* Role management lebih kompleks
* Notifikasi peminjaman
* UI/UX lebih modern

---

## 👨‍💻 Developer

* Nama: Adrian Maulana
* Project: Daily Project 7

---

## 📌 Kesimpulan

Aplikasi ini berhasil memenuhi kebutuhan dasar sistem peminjaman ruangan sesuai desain sebelumnya. Meskipun tanpa database, sistem tetap dapat berjalan menggunakan session dan data statis.

---
