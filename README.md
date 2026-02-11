<p align="center">
  <img src="public/images/logo.png" alt="K-amu SKL Logo" width="120">
</p>

<h1 align="center">K-amu SKL</h1>
<h3 align="center">Sumber Kompetensi Literasi</h3>

<p align="center">
  <strong>Platform kumpulan link & tools edukasi gratis</strong><br>
  Membangun Kompetensi Melalui Literasi Digital
</p>

<p align="center">
  <a href="https://github.com/kuro-myths/K-amu-SKL/actions"><img src="https://img.shields.io/github/actions/workflow/status/kuro-myths/K-amu-SKL/tests.yml?branch=main&label=tests&style=flat-square" alt="Tests"></a>
  <a href="https://github.com/kuro-myths/K-amu-SKL/blob/main/LICENSE.md"><img src="https://img.shields.io/badge/license-Custom-blue?style=flat-square" alt="License"></a>
  <a href="https://github.com/kuro-myths/K-amu-SKL/stargazers"><img src="https://img.shields.io/github/stars/kuro-myths/K-amu-SKL?style=flat-square&color=C8B6FF" alt="Stars"></a>
  <a href="https://github.com/kuro-myths/K-amu-SKL/network/members"><img src="https://img.shields.io/github/forks/kuro-myths/K-amu-SKL?style=flat-square&color=A0E7E5" alt="Forks"></a>
  <a href="https://github.com/kuro-myths/K-amu-SKL/issues"><img src="https://img.shields.io/github/issues/kuro-myths/K-amu-SKL?style=flat-square" alt="Issues"></a>
</p>

---

## 🌐 Tentang K-amu SKL

**K-amu SKL** (Sumber Kompetensi Literasi) adalah platform open-source yang dirancang untuk mengumpulkan, mengelola, dan berbagi link edukasi gratis dari seluruh internet. Dibangun dengan semangat literasi digital dan kompetensi untuk semua.

### 🎯 Misi

- Menyediakan akses edukasi gratis yang terstruktur dan terkurasi
- Membangun komunitas yang saling berbagi sumber belajar
- Meningkatkan literasi digital di Indonesia

### ✨ Fitur Utama

| Fitur                    | Deskripsi                                     |
| ------------------------ | --------------------------------------------- |
| 🔗 **CRUD Link Edukasi** | Tambah, edit, hapus link edukasi              |
| 🔐 **Multi Auth**        | Login/Register + Google OAuth + GitHub OAuth  |
| 👑 **Role System**       | Admin & User dengan middleware                |
| ✅ **Approval System**   | Link baru perlu di-approve admin              |
| 🔖 **Bookmark**          | Simpan link favorit                           |
| ⭐ **Review & Rating**   | Beri rating dan komentar                      |
| 📊 **Dashboard**         | Statistik untuk admin dan user                |
| 🔍 **Search & Filter**   | Cari berdasarkan kategori, level, popularitas |
| 📱 **Responsive UI**     | Modern, glassmorphism, gradient design        |

---

## 🛠 Tech Stack

| Teknologi          | Versi                       |
| ------------------ | --------------------------- |
| **Framework**      | Laravel 12+                 |
| **Database**       | PostgreSQL                  |
| **Authentication** | Laravel Breeze + Socialite  |
| **Frontend**       | Blade + Tailwind CSS + Vite |
| **Language**       | PHP 8.2+                    |

---

## 🎨 Design System

| Elemen              | Nilai                                           |
| ------------------- | ----------------------------------------------- |
| **Primary Color**   | `#C8B6FF` (Ungu Muda)                           |
| **Secondary Color** | `#A0E7E5` (Biru Muda)                           |
| **Gradient**        | `linear-gradient(135deg, #C8B6FF, #A0E7E5)`     |
| **Style**           | Modern clean, soft shadow, glassmorphism ringan |
| **UI**              | Rounded card, hover glow, smooth animation      |

---

## 📁 Struktur Project

```
K-amu-SKL/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/                  # Admin controllers
│   │   │   ├── LandingController       # Landing page
│   │   │   ├── ExploreController       # Explore & search
│   │   │   ├── DashboardController     # User dashboard
│   │   │   ├── ReviewController        # Review system
│   │   │   └── SocialAuthController    # OAuth Google & GitHub
│   │   └── Middleware/
│   │       └── AdminMiddleware         # Admin role guard
│   ├── Models/
│   │   ├── User, Category, Education
│   │   ├── Bookmark, Review
│   └── Policies/
│       └── EducationPolicy
├── database/
│   ├── migrations/                     # 6 migration files
│   └── seeders/                        # Admin + Category seeder
├── resources/views/
│   ├── layouts/                        # Base layouts
│   ├── landing.blade.php               # Landing page (10 section)
│   ├── explore/                        # Explore pages
│   ├── dashboard/                      # User dashboard
│   └── admin/                          # Admin panel
├── routes/web.php                      # All routes
├── LICENSE.md                          # Lisensi Karya
├── LICENSE-COLLABORATION.md            # Lisensi Kerja Sama
├── LICENSE-CONTRIBUTION.md             # Lisensi Kontribusi
├── CONTRIBUTING.md                     # Panduan kontribusi
├── SPONSORS.md                         # Informasi sponsor
├── SECURITY.md                         # Kebijakan keamanan
├── CODE_OF_CONDUCT.md                  # Kode etik
└── README.md                           # Dokumentasi utama
```

---

## 🚀 Instalasi & Setup

### Prasyarat

- PHP >= 8.2
- Composer
- Node.js >= 18
- PostgreSQL
- Git

### Langkah Instalasi

```bash
# 1. Clone repository
git clone https://github.com/kuro-myths/K-amu-SKL.git
cd K-amu-SKL

# 2. Install dependencies
composer install
npm install

# 3. Copy environment file
cp .env.example .env

# 4. Generate application key
php artisan key:generate

# 5. Konfigurasi database di .env
# DB_CONNECTION=pgsql
# DB_HOST=127.0.0.1
# DB_PORT=5432
# DB_DATABASE=kamu_skl
# DB_USERNAME=postgres
# DB_PASSWORD=your_password

# 6. Konfigurasi OAuth di .env (opsional)
# GOOGLE_CLIENT_ID=your_google_client_id
# GOOGLE_CLIENT_SECRET=your_google_client_secret
# GITHUB_CLIENT_ID=your_github_client_id
# GITHUB_CLIENT_SECRET=your_github_client_secret

# 7. Buat database PostgreSQL
createdb kamu_skl

# 8. Jalankan migration & seeder
php artisan migrate --seed

# 9. Build assets
npm run build

# 10. Jalankan server
php artisan serve
```

### Development

```bash
# Jalankan dev server dengan hot reload
composer dev

# Atau manual
php artisan serve
npm run dev
```

---

## 🔑 Akun Default

| Role  | Email              | Password |
| ----- | ------------------ | -------- |
| Admin | admin@kamu-skl.com | password |

> ⚠️ **Ganti password default setelah setup pertama kali!**

---

## 🗺 Route Structure

### Public Routes

| Method | URI                 | Deskripsi           |
| ------ | ------------------- | ------------------- |
| GET    | `/`                 | Landing page        |
| GET    | `/explore`          | Jelajahi semua link |
| GET    | `/categories`       | Daftar kategori     |
| GET    | `/education/{slug}` | Detail link edukasi |

### Auth Routes

| Method | URI                     | Deskripsi        |
| ------ | ----------------------- | ---------------- |
| GET    | `/login`                | Halaman login    |
| GET    | `/register`             | Halaman register |
| GET    | `/auth/google/redirect` | Login via Google |
| GET    | `/auth/github/redirect` | Login via GitHub |

### User Routes (Authenticated)

| Method   | URI                      | Deskripsi          |
| -------- | ------------------------ | ------------------ |
| GET      | `/dashboard`             | Dashboard user     |
| GET/POST | `/submit`                | Submit link baru   |
| GET/PUT  | `/education/{slug}/edit` | Edit link sendiri  |
| DELETE   | `/education/{slug}`      | Hapus link sendiri |
| GET      | `/bookmarks`             | Daftar bookmark    |
| POST     | `/bookmark/{id}`         | Toggle bookmark    |

### Admin Routes

| Method | URI                              | Deskripsi             |
| ------ | -------------------------------- | --------------------- |
| GET    | `/admin`                         | Dashboard admin       |
| CRUD   | `/admin/categories`              | Kelola kategori       |
| GET    | `/admin/educations`              | Kelola semua link     |
| GET    | `/admin/educations/pending`      | Link pending approval |
| PATCH  | `/admin/educations/{id}/approve` | Approve link          |
| PATCH  | `/admin/educations/{id}/reject`  | Reject link           |
| GET    | `/admin/users`                   | Kelola user           |

---

## 📊 Database Schema (ERD)

```
┌──────────────┐     ┌──────────────┐     ┌───────────────┐
│    users      │     │  categories  │     │  educations    │
├──────────────┤     ├──────────────┤     ├───────────────┤
│ id           │     │ id           │     │ id             │
│ name         │     │ name         │     │ title          │
│ email        │     │ slug         │     │ slug           │
│ password     │     │ description  │     │ description    │
│ role         │     │ icon         │     │ url            │
│ provider     │     │ timestamps   │     │ category_id ───┼──→ categories.id
│ provider_id  │     └──────────────┘     │ level          │
│ avatar       │                          │ created_by ────┼──→ users.id
│ timestamps   │     ┌──────────────┐     │ status         │
└──────┬───────┘     │  bookmarks   │     │ views          │
       │             ├──────────────┤     │ thumbnail      │
       │             │ id           │     │ timestamps     │
       ├─────────────│ user_id      │     └──────┬─────────┘
       │             │ education_id─┼────────────┘
       │             │ timestamps   │
       │             └──────────────┘
       │
       │             ┌──────────────┐
       │             │   reviews    │
       │             ├──────────────┤
       │             │ id           │
       ├─────────────│ user_id      │
                     │ education_id─┼──→ educations.id
                     │ rating       │
                     │ comment      │
                     │ timestamps   │
                     └──────────────┘
```

---

## 🤝 Kontribusi

Kami sangat menyambut kontribusi dari siapa saja! Silakan baca [CONTRIBUTING.md](CONTRIBUTING.md) untuk panduan lengkap.

### Quick Start Kontribusi

1. Fork repository ini
2. Buat branch fitur: `git checkout -b feature/fitur-baru`
3. Commit perubahan: `git commit -m 'feat: tambah fitur baru'`
4. Push ke branch: `git push origin feature/fitur-baru`
5. Buat Pull Request

---

## 💰 Sponsors

Dukung pengembangan K-amu SKL! Lihat [SPONSORS.md](SPONSORS.md) untuk informasi lebih lanjut.

---

## 📜 Lisensi

Project ini menggunakan **3 jenis lisensi** yang mengatur aspek berbeda:

| Lisensi                   | File                                                 | Cakupan                             |
| ------------------------- | ---------------------------------------------------- | ----------------------------------- |
| 📄 **Lisensi Karya**      | [LICENSE.md](LICENSE.md)                             | Hak cipta atas kode sumber & karya  |
| 🤝 **Lisensi Kerja Sama** | [LICENSE-COLLABORATION.md](LICENSE-COLLABORATION.md) | Perjanjian kerja sama & partnership |
| 🧑‍💻 **Lisensi Kontribusi** | [LICENSE-CONTRIBUTION.md](LICENSE-CONTRIBUTION.md)   | Hak & kewajiban kontributor         |

---

## 🔮 Roadmap

- [x] Landing page dengan 10 section
- [x] Sistem CRUD link edukasi
- [x] OAuth Google & GitHub
- [x] Role-based access (Admin & User)
- [x] Approval system
- [x] Bookmark system
- [x] Review & rating
- [ ] Dark mode
- [ ] Poin kontribusi user
- [ ] Top contributor badge
- [ ] Public API
- [ ] Newsletter
- [ ] Blog edukasi
- [ ] Multi bahasa (i18n)

---

## 📞 Kontak & Social

- **GitHub**: [@kuro-myths](https://github.com/kuro-myths)
- **Repository**: [K-amu-SKL](https://github.com/kuro-myths/K-amu-SKL)

---

<p align="center">
  Dibuat dengan ❤️ oleh <a href="https://github.com/kuro-myths">kuro-myths</a><br>
  <strong>K-amu SKL — Sumber Kompetensi Literasi</strong><br>
  <em>Membangun Kompetensi Melalui Literasi Digital</em>
</p>
