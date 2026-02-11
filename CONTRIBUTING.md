# 🤝 PANDUAN KONTRIBUSI — K-amu SKL

**Sumber Kompetensi Literasi**

Terima kasih atas minat Anda untuk berkontribusi pada K-amu SKL! 🎉

Dokumen ini berisi panduan langkah demi langkah untuk berkontribusi. Sebelum memulai, pastikan Anda sudah membaca [LICENSE-CONTRIBUTION.md](LICENSE-CONTRIBUTION.md) yang mengatur hak dan kewajiban kontributor.

---

## 📋 Daftar Isi

- [Sebelum Memulai](#-sebelum-memulai)
- [Setup Development Environment](#-setup-development-environment)
- [Alur Kontribusi](#-alur-kontribusi)
- [Jenis Kontribusi](#-jenis-kontribusi)
- [Coding Standards](#-coding-standards)
- [Commit Convention](#-commit-convention)
- [Pull Request Guidelines](#-pull-request-guidelines)
- [Issue Guidelines](#-issue-guidelines)
- [Review Process](#-review-process)

---

## 📝 Sebelum Memulai

1. ✅ Baca [README.md](README.md) untuk memahami project
2. ✅ Baca [CODE_OF_CONDUCT.md](CODE_OF_CONDUCT.md) dan patuhi
3. ✅ Baca [LICENSE-CONTRIBUTION.md](LICENSE-CONTRIBUTION.md) untuk memahami hak & kewajiban
4. ✅ Cek [Issues](https://github.com/kuro-myths/K-amu-SKL/issues) untuk melihat tugas yang tersedia
5. ✅ Cek [Pull Requests](https://github.com/kuro-myths/K-amu-SKL/pulls) untuk memastikan belum ada yang mengerjakan

---

## 🛠 Setup Development Environment

### Prasyarat

- PHP >= 8.2
- Composer
- Node.js >= 18
- PostgreSQL
- Git

### Langkah Setup

```bash
# 1. Fork repository di GitHub

# 2. Clone fork Anda
git clone https://github.com/YOUR_USERNAME/K-amu-SKL.git
cd K-amu-SKL

# 3. Tambahkan upstream remote
git remote add upstream https://github.com/kuro-myths/K-amu-SKL.git

# 4. Install dependencies
composer install
npm install

# 5. Setup environment
cp .env.example .env
php artisan key:generate

# 6. Konfigurasi database
# Edit .env sesuai PostgreSQL Anda

# 7. Jalankan migration
php artisan migrate --seed

# 8. Jalankan development server
php artisan serve
npm run dev
```

---

## 🔄 Alur Kontribusi

```
1. Fork → Clone → Setup
2. Sync dengan upstream: git pull upstream main
3. Buat branch baru: git checkout -b type/deskripsi
4. Kerjakan perubahan
5. Test secara lokal
6. Commit dengan pesan yang jelas
7. Push ke fork: git push origin type/deskripsi
8. Buat Pull Request ke branch main
9. Tunggu review
10. Revisi jika diminta
11. PR di-merge! 🎉
```

### Branch Naming Convention

| Prefix      | Penggunaan  | Contoh                  |
| ----------- | ----------- | ----------------------- |
| `feature/`  | Fitur baru  | `feature/dark-mode`     |
| `fix/`      | Bug fix     | `fix/search-pagination` |
| `docs/`     | Dokumentasi | `docs/api-readme`       |
| `refactor/` | Refactoring | `refactor/auth-service` |
| `style/`    | UI/styling  | `style/landing-page`    |
| `test/`     | Testing     | `test/education-model`  |

---

## 🎯 Jenis Kontribusi

### 💻 Kode

- Fitur baru
- Bug fixes
- Performance improvement
- Refactoring
- Testing

### 📝 Dokumentasi

- Perbaikan README
- Penambahan komentar kode
- Tutorial penggunaan
- Terjemahan

### 🐛 Bug Reports

Laporkan bug dengan informasi:

- Deskripsi bug
- Langkah reproduksi
- Expected behavior
- Actual behavior
- Screenshots (jika ada)
- Environment (OS, browser, PHP version)

### 💡 Feature Requests

Ajukan fitur dengan informasi:

- Deskripsi fitur
- Use case / alasan
- Mockup (jika ada)
- Prioritas (nice-to-have / must-have)

### 🎨 Design

- UI/UX improvement
- Icon dan ilustrasi
- Responsive design fix

---

## 📐 Coding Standards

### PHP (Laravel)

- Ikuti **PSR-12** coding standard
- Gunakan **Laravel conventions**
- Type hint semua parameter dan return type
- Dokumentasikan method yang kompleks

```php
// ✅ Good
public function approvedEducations(): HasMany
{
    return $this->hasMany(Education::class)->where('status', 'approved');
}

// ❌ Bad
public function get_approved($status) {
    return Education::where('status', $status)->get();
}
```

### Blade Templates

- Gunakan komponen Blade untuk reusability
- Indent konsisten (4 spaces)
- Gunakan `@csrf` dan `@method` di forms

### JavaScript

- Gunakan ES6+ syntax
- Avoid global variables

### CSS/Tailwind

- Sesuaikan dengan design system (warna `#C8B6FF` dan `#A0E7E5`)
- Mobile-first approach
- Gunakan utility classes Tailwind

---

## 📝 Commit Convention

Format: `type: deskripsi singkat`

```
feat: tambah fitur bookmark
fix: perbaiki bug search case-insensitive
docs: update README instalasi
style: perbaiki alignment card di explore
refactor: pisahkan logic approval ke service
test: tambah test untuk EducationPolicy
chore: update composer dependencies
```

### Rules

- Gunakan bahasa **Indonesia** atau **Inggris** (konsisten dalam satu PR)
- Deskripsi singkat, jelas, imperatif
- Maksimal 72 karakter untuk subject line
- Tambahkan body jika perlu penjelasan detail

---

## 🔍 Pull Request Guidelines

### Template PR

```markdown
## Deskripsi

[Jelaskan perubahan yang dilakukan]

## Jenis Perubahan

- [ ] Bug fix
- [ ] Fitur baru
- [ ] Breaking change
- [ ] Dokumentasi

## Cara Testing

[Langkah untuk test perubahan ini]

## Screenshots

[Jika ada perubahan UI]

## Checklist

- [ ] Kode mengikuti coding standard project
- [ ] Self-review sudah dilakukan
- [ ] Komentar ditambahkan di bagian yang kompleks
- [ ] Dokumentasi sudah diupdate
- [ ] Tidak ada warning/error baru
- [ ] Test sudah ditambahkan (jika applicable)

## Related Issues

Fixes #[nomor issue]
```

### PR Tips

1. **Satu PR, satu tujuan** — Jangan campur fitur dengan bugfix
2. **PR kecil lebih baik** — Mudah di-review
3. **Jelaskan "mengapa"** — Bukan hanya "apa"
4. **Test sebelum submit** — Pastikan berjalan di lokal

---

## 🐛 Issue Guidelines

### Bug Report Template

```markdown
## Bug Description

[Deskripsi singkat]

## Steps to Reproduce

1. Buka halaman...
2. Klik tombol...
3. Lihat error...

## Expected Behavior

[Yang seharusnya terjadi]

## Actual Behavior

[Yang terjadi sebenarnya]

## Screenshots

[Jika ada]

## Environment

- OS: [e.g. Windows 11]
- Browser: [e.g. Chrome 120]
- PHP: [e.g. 8.3]
- Laravel: [e.g. 12.x]
```

---

## 🔎 Review Process

1. **Auto checks** — CI/CD akan menjalankan linting dan tests
2. **Maintainer review** — Minimal 1 approval dari maintainer
3. **Feedback** — Anda mungkin diminta untuk revisi
4. **Merge** — Setelah approved, PR akan di-merge

### Timeline

- Review biasanya dilakukan dalam **3-7 hari kerja**
- PRs yang kompleks mungkin membutuhkan waktu lebih lama
- Jika belum di-review setelah 7 hari, boleh mention maintainer

---

## 🏷️ Labels

| Label              | Deskripsi                    |
| ------------------ | ---------------------------- |
| `bug`              | Bug report                   |
| `feature`          | Feature request              |
| `enhancement`      | Improvement                  |
| `documentation`    | Dokumentasi                  |
| `good first issue` | Cocok untuk kontributor baru |
| `help wanted`      | Butuh bantuan                |
| `priority: high`   | Prioritas tinggi             |
| `priority: low`    | Prioritas rendah             |

---

## 🎉 Terima Kasih!

Setiap kontribusi, sekecil apapun, sangat berarti untuk K-amu SKL dan misi edukasi gratis.

**🔖 Kontributor akan mendapatkan kredit sesuai dengan [LICENSE-CONTRIBUTION.md](LICENSE-CONTRIBUTION.md).**

---

**© 2026 kuro-myths. K-amu SKL — Sumber Kompetensi Literasi.**
