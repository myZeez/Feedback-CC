# Feedback Cellcom Palangkaraya

Project Laravel untuk mengumpulkan ulasan privat pelanggan Toko Cellcom Palangkaraya.

## Fitur

- Halaman pelanggan mobile-first dengan form feedback.
- Ulasan tidak dipublikasikan di halaman umum.
- Login admin untuk melihat semua ulasan.
- Database MySQL.

## Setup Lokal

Pastikan database MySQL aktif, lalu sesuaikan `.env` bila perlu:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=feedback_cellcom
DB_USERNAME=root
DB_PASSWORD=
```

Jalankan migrasi dan seeder:

```bash
php artisan migrate --seed
```

Jalankan server:

```bash
php artisan serve
```

Halaman pelanggan:

```text
http://127.0.0.1:8000
```

Halaman admin:

```text
http://127.0.0.1:8000/admin/login
```

Akun admin awal:

```text
Email: admin@cellcompalangkaraya.test
Password: password
```

Ganti password admin sebelum dipakai produksi.
