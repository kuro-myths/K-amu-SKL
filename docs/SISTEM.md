# K-amu SKL: Penjelasan Sistem

K-amu SKL (Sumber Kompetensi Literasi) adalah platform kurasi link edukasi gratis berbasis Laravel.
Sistem ini memungkinkan komunitas berbagi resource belajar, lalu admin memoderasi kualitas konten sebelum dipublikasikan.

## Tujuan Sistem

- Mengumpulkan link edukasi gratis dari berbagai sumber terpercaya.
- Menyediakan eksplorasi konten berdasarkan kategori, level, popularitas, dan rating.
- Memfasilitasi kontribusi komunitas dengan alur moderasi admin.
- Menyediakan fitur personal seperti bookmark dan profil.

## Arsitektur Singkat

- Backend: Laravel 12 (MVC + Eloquent ORM)
- Frontend: Blade + Tailwind CSS + Alpine.js
- Database utama:
  - users
  - categories
  - educations
  - bookmarks
  - reviews

## Alur Data Inti

1. User submit link edukasi dari dashboard.
2. Data masuk ke tabel educations dengan status pending.
3. Admin melakukan approve/reject di panel admin.
4. Hanya data approved tampil di halaman publik (landing/explore/detail).
5. User lain dapat memberi rating/review dan bookmark.

## Fitur Unggulan (Baru)

Sistem sekarang mendukung label Link Unggulan.

- Kolom database baru: educations.is_featured (boolean).
- Admin dapat menandai atau melepas label unggulan dari halaman kelola edukasi.
- Link unggulan otomatis hanya valid untuk status approved.
- Landing page menampilkan section Pilihan Unggulan Minggu Ini.
- Halaman explore mendukung filter unggulan.

## Role dan Akses

- Guest:
  - Lihat landing, explore, kategori, dan detail edukasi approved.
- User:
  - Semua akses guest.
  - Register/login/logout.
  - Submit, edit, hapus link milik sendiri.
  - Bookmark dan review.
  - Kelola profil.
- Admin:
  - Semua akses user.
  - Dashboard admin.
  - Kelola kategori, edukasi, user.
  - Approve/reject link dan atur link unggulan.

## Command Operasional

- Install dependency: composer install; npm install
- Generate app key: php artisan key:generate
- Migrasi database: php artisan migrate
- Seed data awal: php artisan db:seed
- Jalankan aplikasi: php artisan serve
- Build frontend dev: npm run dev

## Catatan Implementasi

- Route model binding untuk Education dan Category menggunakan slug.
- Review hanya bisa dibuat untuk edukasi berstatus approved.
- Jika edukasi di-reject, label unggulan otomatis dilepas.
