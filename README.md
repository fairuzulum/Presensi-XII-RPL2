
# README

Presensi XII RPL 2 adalah sistem informasi berbasis web yang digunakan untuk mencatat dan mengelola data presensi siswa kelas XII RPL 2.

---

## 🛠️ Rekayasa Struktural & Direktori Utama

Berikut adalah daftar direktori dan file utama yang membentuk struktur sistem:

```text
Presensi-XII-RPL2/
├── .htaccess                 # Konfigurasi rewrite URL dan kontrol akses Apache
├── assets/
│   ├── css/                  # Berkas skema warna & gaya tampilan CSS
│   │   ├── blue.css
│   │   ├── cyan.css
│   │   ├── default.css
│   │   ├── green.css
│   │   ├── indigo.css
│   │   ├── orange.css
│   │   ├── pink.css
│   │   ├── purple.css
│   │   ├── red.css
│   │   └── yellow.css
│   ├── gbrqrcode/            # Direktori penyimpanan file gambar QR Code siswa
│   └── img/                  # Asset gambar umum (misal: background/bg.jpg)

```

---

## 🎨 Tema Tampilan (Skema Warna)

Sistem ini mendukung kustomisasi tema visual menggunakan stylesheet CSS yang terletak di direktori `assets/css/`:

* **Default** (`default.css`)
* **Blue** (`blue.css`)
* **Cyan** (`cyan.css`)
* **Green** (`green.css`)
* **Indigo** (`indigo.css`)
* **Orange** (`orange.css`)
* **Pink** (`pink.css`)
* **Purple** (`purple.css`)
* **Red** (`red.css`)
* **Yellow** (`yellow.css`)

---

## 🚀 Fitur Utama

1. **Pemindaian QR Code (Presensi Siswa)**
* Mendukung generasi dan validasi gambar QR Code otomatis yang tersimpan pada direktori `assets/gbrqrcode/`.


2. **Kustomisasi Antarmuka**
* Fleksibilitas dalam mengubah warna tema aplikasi berbasis stylesheet yang modular.


3. **Konfigurasi Server Terintegrasi**
* Pengaturan penanganan rute URL dan proteksi direktori melalui file `.htaccess`.



---

## 💻 Cara Penggunaan / Instalasi

1. **Persyaratan Server:**
* Web Server (Apache/Nginx dengan modul `mod_rewrite` aktif).
* PHP versi 7.x atau versi yang lebih baru.
* Database MySQL / MariaDB.


2. **Langkah-Langkah:**
1. Unduh atau *cloning* repositori ini ke direktori server web Anda (contoh: `htdocs` atau `var/www/html`).
2. Pastikan konfigurasi database sudah terhubung dengan skrip sistem.
3. Pastikan izin akses folder `assets/gbrqrcode/` diperbolehkan untuk penyimpanan file QR Code.
4. Buka peramban (browser) dan akses alamat lokal/domain aplikasi Anda.



---

