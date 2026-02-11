# 🧑‍💻 LISENSI KONTRIBUSI — K-amu SKL

**Perjanjian Lisensi Kontributor / Contributor License Agreement (CLA)**

Versi 1.0 — Berlaku sejak 11 Februari 2026

---

## Pasal 1 — Definisi

1. **"Project"** merujuk pada K-amu SKL (Sumber Kompetensi Literasi) beserta seluruh kode sumber, dokumentasi, dan aset terkait.
2. **"Pemilik"** merujuk pada **kuro-myths** (GitHub: [@kuro-myths](https://github.com/kuro-myths)), selaku pembuat dan pengelola utama Project.
3. **"Kontributor"** merujuk pada siapa saja yang memberikan kontribusi kepada Project melalui Pull Request, Issue, atau cara lainnya.
4. **"Kontribusi"** merujuk pada kode, dokumentasi, desain, bug report, fitur request, review, atau karya lain yang disubmit ke Project.

---

## Pasal 2 — Ruang Lingkup

Lisensi ini mengatur hak dan kewajiban setiap individu yang berkontribusi pada K-amu SKL, termasuk namun tidak terbatas pada:

- Pull Request (kode, dokumentasi, desain)
- Bug reports dan feature requests
- Code review dan testing
- Diskusi teknis dan arsitektural
- Pembuatan konten dan tutorial
- Terjemahan dan lokalisasi

---

## Pasal 3 — Persetujuan Kontributor

Dengan mengirimkan Kontribusi ke Project ini, Kontributor **secara otomatis menyetujui** bahwa:

### 3.1 Pemberian Hak

1. Kontributor memberikan **hak non-eksklusif, berlaku selamanya, berlaku di seluruh dunia, dan tidak dapat dicabut** kepada Pemilik untuk menggunakan, memodifikasi, mendistribusikan, dan mensub-lisensikan Kontribusi sebagai bagian dari Project.
2. Kontributor tetap memiliki hak cipta atas Kontribusinya sendiri.
3. Kontributor mengizinkan Kontribusinya untuk dilisensikan di bawah lisensi yang sama dengan Project ([LICENSE.md](LICENSE.md)).

### 3.2 Jaminan Kontributor

Kontributor menjamin bahwa:

1. Kontribusi adalah **karya asli** atau memiliki hak yang sah untuk menyubmitnya.
2. Kontribusi **tidak melanggar hak cipta** pihak ketiga.
3. Kontribusi **tidak mengandung malware**, backdoor, atau kode berbahaya.
4. Kontributor **memiliki kewenangan** untuk memberikan hak yang disebutkan di atas.
5. Jika Kontribusi dibuat atas nama organisasi/perusahaan, Kontributor memiliki otorisasi untuk itu.

---

## Pasal 4 — Kategori Kontributor

### 🥇 Core Contributor

- Kontributor dengan akses commit langsung
- Ditunjuk secara langsung oleh Pemilik
- Bertanggung jawab atas review PR dan maintenance
- Mendapatkan label "Core Contributor" di profil project

### 🥈 Active Contributor

- Kontributor yang secara regular mengirimkan PR berkualitas
- Minimal 5 PR yang di-merge dalam 6 bulan terakhir
- Mendapatkan label "Active Contributor"
- Diprioritaskan dalam review PR

### 🥉 Contributor

- Siapa saja yang memiliki minimal 1 PR yang di-merge
- Tercantum dalam daftar contributor project
- Mendapatkan kredit di changelog dan release notes

### 💬 Community Contributor

- Kontributor non-code: bug report, diskusi, dokumentasi
- Termasuk tester, translator, dan content creator
- Mendapatkan kredit sesuai kontribusi

---

## Pasal 5 — Proses Kontribusi

### 5.1 Alur Kontribusi

```
1. Fork repository
2. Buat branch baru (feature/fix/docs)
3. Kerjakan perubahan
4. Tulis/update tests (jika applicable)
5. Commit dengan pesan yang jelas
6. Push ke fork
7. Buat Pull Request
8. Review oleh maintainer
9. Revisi jika diperlukan
10. Merge setelah approved
```

### 5.2 Standar Kode

1. Ikuti coding style yang sudah ada di project
2. Gunakan **Laravel conventions** dan **PSR-12** untuk PHP
3. Tulis komentar yang jelas untuk logika kompleks
4. Pastikan tidak ada error/warning sebelum submit PR
5. Update dokumentasi jika menambah/mengubah fitur

### 5.3 Standar Commit Message

Format: `type: deskripsi singkat`

| Type       | Penggunaan              |
| ---------- | ----------------------- |
| `feat`     | Fitur baru              |
| `fix`      | Bug fix                 |
| `docs`     | Dokumentasi             |
| `style`    | Formatting (bukan CSS)  |
| `refactor` | Refactoring kode        |
| `test`     | Menambah/mengubah tests |
| `chore`    | Maintenance             |

Contoh:

```
feat: tambah fitur bookmark untuk user
fix: perbaiki bug search case-insensitive
docs: update README instalasi PostgreSQL
```

### 5.4 Pull Request Requirements

Setiap PR harus menyertakan:

1. **Judul yang jelas** menggambarkan perubahan
2. **Deskripsi** yang menjelaskan apa dan mengapa
3. **Screenshot** (jika ada perubahan UI)
4. **Test** yang relevan (jika kode fungsional)
5. **Link issue** terkait (jika ada)

---

## Pasal 6 — Hak Kontributor

### 6.1 Kredit & Atribusi

1. Nama Kontributor akan tercantum di daftar contributor GitHub.
2. Kontribusi signifikan akan disebutkan di changelog/release notes.
3. Core Contributor mendapatkan badge khusus.

### 6.2 Hak Lainnya

1. Kontributor berhak **mencantumkan kontribusi** di portfolio pribadi.
2. Kontributor berhak **mendiskusikan** arah pengembangan project.
3. Kontributor berhak **mengundurkan diri** kapan saja.
4. Kontributor berhak mendapat **sertifikat kontribusi** (jika diminta).

---

## Pasal 7 — Kewajiban Kontributor

1. **Mematuhi** [CODE_OF_CONDUCT.md](CODE_OF_CONDUCT.md).
2. **Menjaga kualitas** kode sesuai standar project.
3. **Berkomunikasi** secara profesional dan respect.
4. **Tidak menyalahgunakan** akses yang diberikan.
5. **Merespon feedback** dari reviewer dalam waktu wajar.
6. **Melaporkan** kerentanan keamanan secara bertanggung jawab sesuai [SECURITY.md](SECURITY.md).

---

## Pasal 8 — Hak Pemilik atas Kontribusi

1. Pemilik berhak **menerima atau menolak** setiap Kontribusi.
2. Pemilik berhak **memodifikasi** Kontribusi sebelum atau setelah di-merge.
3. Pemilik berhak **menghapus** Kontribusi jika ditemukan melanggar ketentuan.
4. Pemilik berhak **mengubah lisensi** project (Kontribusi yang sudah di-merge tetap mengikuti lisensi baru).
5. Keputusan akhir terkait arsitektur dan fitur ada pada Pemilik.

---

## Pasal 9 — Pencabutan Status Kontributor

Status kontributor dapat dicabut jika:

1. Melanggar [CODE_OF_CONDUCT.md](CODE_OF_CONDUCT.md).
2. Submit kode berbahaya (malware, backdoor).
3. Plagiarisme atau melanggar hak cipta.
4. Tindakan yang merugikan project atau komunitas.
5. Penyalahgunaan akses yang diberikan.

Proses pencabutan:

1. Peringatan pertama (tertulis)
2. Peringatan kedua (jika pelanggaran berulang)
3. Pencabutan akses dan status

---

## Pasal 10 — Penolakan Jaminan

1. Kontribusi diterima **"SEBAGAIMANA ADANYA"** (AS IS).
2. Pemilik tidak berkewajiban memberikan kompensasi finansial atas Kontribusi.
3. Kontribusi yang di-reject tidak menimbulkan kewajiban apapun.

---

## Pasal 11 — Hukum yang Berlaku

Lisensi ini tunduk pada hukum yang berlaku di **Republik Indonesia**.

---

## 📌 Ringkasan

| Aspek                     | Keterangan                       |
| ------------------------- | -------------------------------- |
| Siapa bisa kontribusi     | ✅ Siapa saja                    |
| Hak cipta kontribusi      | Tetap milik kontributor          |
| Lisensi kontribusi        | Non-eksklusif, selamanya, global |
| Kredit/atribusi           | ✅ Diberikan                     |
| Kompensasi finansial      | ❌ Tidak ada (voluntary)         |
| Mencantumkan di portfolio | ✅ Diizinkan                     |
| Keputusan akhir           | Pemilik Project                  |
| Code of Conduct           | ⚠️ Wajib dipatuhi                |

---

## ✅ Persetujuan

Dengan mengirimkan Pull Request atau Kontribusi lainnya ke repository K-amu SKL, Anda menyatakan telah membaca, memahami, dan menyetujui seluruh ketentuan dalam Lisensi Kontribusi ini.

---

**© 2026 kuro-myths. K-amu SKL — Sumber Kompetensi Literasi.**

Untuk pertanyaan mengenai kontribusi, silakan buat issue di [GitHub](https://github.com/kuro-myths/K-amu-SKL/issues) atau baca [CONTRIBUTING.md](CONTRIBUTING.md).
