<?php

namespace Database\Seeders;

use App\Models\Certificate;
use App\Models\Experience;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        // ===== 1. Profil =====
        Profile::create([
            'full_name'     => 'Muhammad Arkaan Andrean',
            'headline'      => 'Informatics Student | Aspiring UI/UX Designer & Web Developer',
            'bio'           => 'Mahasiswa Informatika Universitas Teknokrat Indonesia yang tertarik pada UI/UX, desain digital, dan pengembangan aplikasi. Senang belajar hal baru dan bercita-cita merancang produk digital yang rapi dan mudah digunakan.',
            'photo_url'     => 'images/profile.jpg',
            'cv_url'        => 'cv/CV-Arkaan.pdf',
            'email'         => 'muhammad_arkaan_andrean@teknokrat.ac.id',
            'phone'         => null,                    // isi jika ingin ditampilkan
            'location'      => 'Bandar Lampung, Indonesia',
            'github_url'    => 'https://github.com/muhammadarkaanandrean',
            'linkedin_url'  => null,                    // isi dengan link LinkedIn-mu
            'instagram_url' => 'https://www.instagram.com/arkaannandrean_?evlk=aXBrNWtmMTdoZnVl',                    // isi dengan link Instagram-mu
        ]);

        // ===== 2. Skills (12 skill, 4 kategori) =====
        $skill = fn (string $name, string $category, string $level, string $icon) =>
            Skill::create(compact('name', 'category', 'level', 'icon'));

        $html     = $skill('HTML5',        'Frontend', 'Advanced',     'html5');
        $css      = $skill('CSS3',         'Frontend', 'Advanced',     'css3');
        $tailwind = $skill('Tailwind CSS', 'Frontend', 'Intermediate', 'tailwindcss');
        $js       = $skill('JavaScript',   'Frontend', 'Intermediate', 'javascript');
        $php      = $skill('PHP',          'Backend',  'Intermediate', 'php');
        $laravel  = $skill('Laravel',      'Backend',  'Intermediate', 'laravel');
        $mysql    = $skill('MySQL',        'Database', 'Intermediate', 'mysql');
        $git      = $skill('Git',          'Tools',    'Intermediate', 'git');
        $github   = $skill('GitHub',       'Tools',    'Intermediate', 'github');
        $vscode   = $skill('VS Code',      'Tools',    'Advanced',     'vscode');
        $figma    = $skill('Figma',        'Tools',    'Advanced',     'figma');
        $postman  = $skill('Postman',      'Tools',    'Beginner',     'postman');

        // ===== 3. Projects (4 proyek) + relasi many-to-many =====
        $makeProject = function (string $title, string $summary, string $description, string $color, ?string $demo, ?string $repo, bool $featured) {
            return Project::create([
                'title'         => $title,
                'slug'          => Str::slug($title),
                'summary'       => $summary,
                'description'   => $description,
                'thumbnail_url' => 'https://placehold.co/640x360/' . $color . '/ffffff?text=' . urlencode($title),
                'demo_url'      => $demo,
                'github_url'    => $repo,
                'is_featured'   => $featured,
            ]);
        };

        $p1 = $makeProject(
            'Nusantara Journey',
            'Aplikasi wisata untuk mengenal destinasi di Bandar Lampung.',
            'Pengguna sulit menemukan informasi wisata Kota Bandar Lampung. Aplikasi ini memudahkan pengguna menemukan dan mengenal destinasi wisata lokal dengan antarmuka yang sederhana.',
            '2563eb', null, null, true
        );
        $p1->skills()->sync([$figma->id]);

        $p2 = $makeProject(
            'Desain Layanan Kesehatan',
            'Rancangan antarmuka aplikasi layanan kesehatan yang modern.',
            'Perancangan antarmuka aplikasi layanan kesehatan dengan fokus pada kemudahan penggunaan, tampilan modern, dan pengalaman pengguna, mulai dari wireframe hingga prototype.',
            '0ea5e9', null, null, false
        );
        $p2->skills()->sync([$figma->id]);

        $p3 = $makeProject(
            'Terra Guard',
            'Konsep game edukasi bertema lingkungan dan SDGs.',
            'Konsep game edukasi sederhana yang mengajak pemain menjaga bumi sekaligus mengenalkan nilai-nilai Sustainable Development Goals.',
            '059669', null, null, false
        );
        $p3->skills()->sync([$figma->id]);

        $p4 = $makeProject(
            'Website Portofolio',
            'Landing page portofolio responsif dengan Laravel dan Tailwind CSS.',
            'Website portofolio satu halaman dengan dark mode, animasi, dan filter proyek. Data portofolio disimpan di database MySQL melalui migration, model Eloquent, dan seeder.',
            '7c3aed',
            'https://muhammadarkaanandrean.github.io/Portofolio/',
            'https://github.com/muhammadarkaanandrean/Portofolio',
            true
        );
        // sync() agar relasi tidak ganda jika seeder dijalankan ulang
        $p4->skills()->sync([$html->id, $css->id, $tailwind->id, $js->id, $php->id, $laravel->id, $mysql->id, $git->id, $github->id, $vscode->id]);

        // ===== 4. Experiences =====
        // CATATAN: tanggal dan data berikut perlu kamu cocokkan dengan data aslimu.
        Experience::create([
            'title'        => 'Mahasiswa S1 Informatika',
            'organization' => 'Universitas Teknokrat Indonesia',
            'type'         => 'Pendidikan',
            'start_date'   => '2024-09-01',
            'end_date'     => null,
            'is_current'   => true,
            'description'  => 'Fokus pada UI/UX, desain digital, dan pengembangan aplikasi. Aktif mengerjakan proyek praktikum dan tugas kuliah.',
        ]);
        Experience::create([
            'title'        => 'Siswa SMA / SMK',                 // GANTI dengan data aslimu
            'organization' => 'Nama Sekolah Kamu',               // GANTI
            'type'         => 'Pendidikan',
            'start_date'   => '2021-07-01',
            'end_date'     => '2024-06-30',
            'is_current'   => false,
            'description'  => 'Tulis jurusan dan pencapaian singkatmu di sini.',
        ]);
        Experience::create([
            'title'        => 'Anggota Organisasi',              // GANTI
            'organization' => 'Nama Organisasi Kampus',          // GANTI
            'type'         => 'Organisasi',
            'start_date'   => '2025-01-10',
            'end_date'     => null,
            'is_current'   => true,
            'description'  => 'Tulis tugas atau peran utamamu.',
        ]);

        // ===== 5. Certificates =====
        // CATATAN: ini contoh. GANTI dengan sertifikat aslimu sebelum dikumpulkan.
        Certificate::create([
            'title'          => 'Nama Sertifikat Pertama',
            'issuer'         => 'Dicoding Academy',
            'issued_date'    => '2025-03-15',
            'credential_url' => null,
            'description'    => 'Tulis ringkasan materi sertifikat.',
        ]);
        Certificate::create([
            'title'          => 'Nama Sertifikat Kedua',
            'issuer'         => 'Coursera',
            'issued_date'    => '2025-08-20',
            'credential_url' => null,
            'description'    => null,
        ]);
    }
}
