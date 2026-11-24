INVENTORY MANAGEMENT SYSTEM

Aplikasi berbasis web untuk mengelola data produk, kategori, dan stok barang.

DESKRIPSI

Inventory Management System merupakan proyek individu yang dikembangkan menggunakan PHP Native dan MySQL. Aplikasi ini dibuat untuk membantu proses pengelolaan inventaris melalui antarmuka web.

FITUR

- Login dan registrasi pengguna
- Dashboard
- CRUD data produk
- CRUD kategori produk
- Pencarian produk
- Pencatatan aktivitas stok (log stok)

TEKNOLOGI

- PHP Native
- MySQL
- HTML
- Tailwind CSS

STRUKTUR PROYEK

Inventory-Management-System/
├── Config/
├── Controllers/
├── Models/
├── Views/
├── database/
│   └── inventory_management.sql
├── helpers/
└── index.php

INSTALASI

1. Clone repository:

   git clone https://github.com/Rafel145/inventory-management-system.git

2. Pindahkan folder proyek ke direktori htdocs pada XAMPP.

3. Buat database MySQL dengan nama inventory_management.

4. Buka phpMyAdmin, pilih database inventory_management, lalu klik tab Import.

5. Pilih file database/inventory_management.sql dari folder proyek, kemudian klik Import.

6. Sesuaikan konfigurasi database pada Config/database.php berdasarkan lingkungan lokal.

7. Jalankan Apache dan MySQL melalui XAMPP.

8. Buka aplikasi melalui browser:

   http://localhost/Inventory-Management-System/

PENGEMBANG

Rafel Margeafany

Mahasiswa Informatika — UPN "Veteran" Jawa Timur
