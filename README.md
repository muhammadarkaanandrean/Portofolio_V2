# Latihan 3 — Landing Page Portofolio dengan Tailwind CSS

> **Pemrograman Web 2 · FE-3 · Framework CSS Utility-First (Tailwind CSS)**

| | |
|---|---|
| **Nama** | Muhammad Arkaan Andrean |
| **NPM** | 24312242 |
| **Kelas** | IF 24 CX |
| **Mata Kuliah** | Pemrograman Web 2 |
| **Branch** | `Lat-3_LandingPage` |
| **Repository** | https://github.com/muhammadarkaanandrean/Portofolio_V2 |
| **Link Branch** | https://github.com/muhammadarkaanandrean/Portofolio_V2/tree/Lat-3_LandingPage |

## Roadmap

```
Lat-1 (HTML) → Lat-2 (CSS + JS) → Lat-3 (Tailwind Landing Page)  ← LATIHAN INI
                                           ↓
                      Lat-4a (Setup Laravel & MySQL)
                                           ↓
                      Lat-4b (Database Migration & Seeder)
                                           ↓
                      Lat-5 (RESTful API) → Lat-6 (Integrasi Fetch)
```

## Screenshot

<!-- Simpan gambar di folder docs/ lalu hapus tanda komentar pada baris di bawah. -->

**Desktop (≥ 1280px)**

<!-- ![Tampilan desktop](docs/lat3-desktop.png) -->

**Tablet (768px)**

<!-- ![Tampilan tablet](docs/lat3-tablet.png) -->

**Mobile (375px)**

<!-- ![Tampilan mobile](docs/lat3-mobile.png) -->

**Hamburger menu terbuka (mobile)**

<!-- ![Menu mobile](docs/lat3-menu.png) -->

## Komponen Halaman

| Komponen | Isi |
|---|---|
| **Navbar** | Nama, tautan ke tiap section, posisi `fixed`, tombol dark mode, dan hamburger menu di layar kecil |
| **Hero** | Foto profil bulat (`rounded-full`), nama, headline, bio, tombol Download CV dan Lihat Proyek, ikon sosial media |
| **Tentang** | Ringkasan latar belakang dan minat |
| **Skills** | 12 skill dalam 4 kategori (Frontend, Backend, Database, Tools) berbentuk badge dengan ikon SVG |
| **Projects** | 4 kartu proyek (rasio 16:9) dengan badge teknologi, tombol Live Demo dan GitHub, serta filter kategori |
| **Pengalaman & Pendidikan** | Timeline vertikal dengan garis `border-l-2` |
| **Sertifikat** | Kartu berisi nama, penerbit, dan tahun |
| **Formulir Kontak** | Nama, Email, Subjek, Pesan dengan `<label>` dan atribut `required`, plus informasi kontak alternatif |
| **Footer** | Hak cipta, tautan cepat, dan ikon sosial media |

Tambahan: dark mode (pilihan tersimpan di browser) dan animasi muncul saat scroll.

Formulir belum mengirim data ke server, sesuai ketentuan latihan. Validasi `required` dijalankan oleh browser, dan pengiriman asli dikerjakan pada milestone API.

## Responsivitas (Mobile-First)

Class tanpa prefix berlaku untuk ponsel, lalu ditingkatkan dengan breakpoint `sm:`, `md:`, dan `lg:`.

| Bagian | Mobile (< 640px) | Tablet (≥ 768px) | Desktop (≥ 1024px) |
|---|---|---|---|
| Navbar | Hamburger (`md:hidden`) | Menu penuh (`hidden md:flex`) | Menu penuh |
| Hero | 1 kolom, foto di atas (`flex-col`) | Foto dan teks berdampingan (`md:flex-row`) | Berdampingan |
| Skills | 1 kolom | 2 kolom (`md:grid-cols-2`) | 2 kolom |
| Proyek | 1 kolom (`grid-cols-1`) | 2 kolom (`md:grid-cols-2`) | 3 kolom (`lg:grid-cols-3`) |
| Timeline | 1 kolom | 2 kolom (`md:grid-cols-2`) | 2 kolom |
| Sertifikat | 1 kolom | 2 kolom (`sm:grid-cols-2`) | 3 kolom (`lg:grid-cols-3`) |

Efek hover kartu proyek: `transition duration-300 hover:-translate-y-1.5 hover:shadow-xl`.

## Teknologi

| Bagian | Teknologi |
|---|---|
| CSS Framework | Tailwind CSS v3 (utility-first) |
| Build tool | Vite (bukan CDN) |
| PostCSS | `postcss` dan `autoprefixer` |
| Ikon | Devicon (skill) dan Font Awesome |
| Font | Poppins |

### Berkas konfigurasi

| Berkas | Fungsi |
|---|---|
| `tailwind.config.js` | `content` memindai `index.html` dan `src/**/*`, `darkMode: 'class'`, serta warna `primary`, `secondary`, `accent`, font, dan animasi kustom |
| `postcss.config.js` | Menjalankan `tailwindcss` dan `autoprefixer` |
| `vite.config.js` | Pengaturan Vite (`base: './'`) |
| `src/style.css` | Direktif `@tailwind base`, `components`, dan `utilities` |
| `src/main.js` | Dark mode, hamburger menu, filter proyek, animasi scroll, dan formulir |
| `package.json` | Script `dev`, `build`, dan `preview` |

## Cara Menjalankan

**Kebutuhan:** Node.js 18 atau lebih baru (disarankan 22 LTS).

```bash
git clone https://github.com/muhammadarkaanandrean/Portofolio_V2.git
cd Portofolio_V2
git switch Lat-3_LandingPage

npm install
npm run dev
```

Buka `http://localhost:5173`.

```bash
npm run build      # membuat folder dist/
npm run preview    # pratinjau hasil build di http://localhost:4173
```

## Struktur File

```
├── index.html               # seluruh section landing page
├── src/
│   ├── style.css            # direktif Tailwind dan CSS kecil
│   └── main.js              # interaksi JavaScript
├── public/
│   ├── images/profile.jpg   # foto profil
│   └── cv/CV-Arkaan.pdf     # file untuk tombol Download CV
├── tailwind.config.js
├── postcss.config.js
├── vite.config.js
├── package.json
└── .gitignore
```

## Keamanan Git

`.gitignore` mengecualikan `node_modules/`, `dist/`, dan `.env`, sehingga folder besar dan file rahasia tidak ikut diunggah.

## Penulis

**Muhammad Arkaan Andrean** — Informatika, Universitas Teknokrat Indonesia
