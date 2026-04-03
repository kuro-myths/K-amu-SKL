# Daftar Fitur K-amu SKL

## Public

- Landing page informatif dengan statistik platform.
- Explore edukasi dengan filter:
  - Pencarian teks
  - Kategori
  - Level
  - Sort (terbaru, populer, rating)
  - Unggulan
- Halaman kategori.
- Detail edukasi + materi terkait.

## Authentication

- Login/Register email dan password.
- Social login:
  - Google OAuth
  - GitHub OAuth
- Logout.

## User Area

- Dashboard user dengan statistik kontribusi.
- Submit link edukasi.
- Edit/hapus link milik sendiri.
- Bookmark link edukasi.
- Rating dan review materi.
- Update profil.

## Admin Area

- Dashboard admin (statistik users, links, pending, kategori, unggulan).
- Kelola kategori (CRUD).
- Kelola edukasi:
  - Lihat semua
  - Filter status/kategori/unggulan
  - Approve/reject
  - Edit/hapus
  - Toggle label unggulan
- Kelola user:
  - Filter role
  - Pencarian user
  - Toggle role admin/user
  - Hapus user

## Moderasi Konten

- Link yang disubmit user masuk status pending.
- Hanya link approved tampil di sisi publik.
- Link unggulan hanya valid untuk status approved.
