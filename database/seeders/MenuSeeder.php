<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MenuItem;
use App\Models\Page;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        MenuItem::query()->delete();
        Page::query()->delete();

        // 1. BERANDA
        MenuItem::create([
            'title' => 'BERANDA',
            'slug' => 'home',
            'url' => '/',
            'icon' => 'fas fa-home',
            'order_position' => 1,
            'is_active' => true,
        ]);
        Page::create([
            'slug' => 'home',
            'title' => 'Beranda LPPM STAIMAS Wonogiri',
            'subtitle' => 'Pusat Penelitian dan Pengabdian kepada Masyarakat STAIMAS Wonogiri',
            'content' => 'Selamat Datang di Website Resmi Lembaga Penelitian dan Pengabdian kepada Masyarakat (LPPM) STAIMAS Wonogiri.',
            'icon' => 'fas fa-home',
        ]);

        // 2. PROGRAM DAN KEBIJAKAN
        MenuItem::create([
            'title' => 'PROGRAM DAN KEBIJAKAN',
            'slug' => 'program-kebijakan',
            'url' => '/program-kebijakan',
            'icon' => 'fas fa-landmark',
            'order_position' => 2,
            'is_active' => true,
        ]);
        Page::create([
            'slug' => 'program-kebijakan',
            'title' => 'Program dan Kebijakan LPPM',
            'subtitle' => 'Arah Strategis Penelitian & Pengabdian Masyarakat STAIMAS Wonogiri',
            'content' => 'Program strategis dan kebijakan tata kelola penelitian serta pengabdian masyarakat STAIMAS Wonogiri.',
            'icon' => 'fas fa-landmark',
        ]);

        // 3. TENTANG KAMI (Dropdown)
        $m3 = MenuItem::create([
            'title' => 'TENTANG KAMI',
            'slug' => 'tentang-kami',
            'url' => '#',
            'icon' => 'fas fa-info-circle',
            'order_position' => 3,
            'is_active' => true,
        ]);

        MenuItem::create([
            'parent_id' => $m3->id,
            'title' => 'Selayang Pandang',
            'slug' => 'selayang-pandang',
            'url' => '/selayang-pandang',
            'order_position' => 1,
            'is_active' => true,
        ]);
        Page::create([
            'slug' => 'selayang-pandang',
            'title' => 'Selayang Pandang LPPM',
            'subtitle' => 'Profil Singkat Lembaga Penelitian dan Pengabdian kepada Masyarakat',
            'content' => 'LPPM STAIMAS Wonogiri merupakan unsur pelaksana akademik.',
            'icon' => 'fas fa-building',
        ]);

        MenuItem::create([
            'parent_id' => $m3->id,
            'title' => 'Sejarah',
            'slug' => 'sejarah',
            'url' => '/sejarah',
            'order_position' => 2,
            'is_active' => true,
        ]);
        Page::create([
            'slug' => 'sejarah',
            'title' => 'Sejarah Pembentukan LPPM',
            'subtitle' => 'Perjalanan Lembaga dalam Mengabdi dan Meneliti',
            'content' => 'Sejak didirikannya STAIMAS Wonogiri, LPPM hadir sebagai pilar utama tri dharma.',
            'icon' => 'fas fa-history',
        ]);

        MenuItem::create([
            'parent_id' => $m3->id,
            'title' => 'Visi dan Misi',
            'slug' => 'visi-misi',
            'url' => '/visi-misi',
            'order_position' => 3,
            'is_active' => true,
        ]);
        Page::create([
            'slug' => 'visi-misi',
            'title' => 'Visi dan Misi LPPM',
            'subtitle' => 'Pedoman dan Tujuan Utama LPPM STAIMAS Wonogiri',
            'content' => 'Visi dan Misi LPPM STAIMAS Wonogiri.',
            'icon' => 'fas fa-bullseye',
        ]);

        MenuItem::create([
            'parent_id' => $m3->id,
            'title' => 'Struktur Organisasi',
            'slug' => 'struktur',
            'url' => '/struktur',
            'order_position' => 4,
            'is_active' => true,
        ]);
        Page::create([
            'slug' => 'struktur',
            'title' => 'Struktur Organisasi LPPM',
            'subtitle' => 'Bagan dan Susunan Pengelola LPPM STAIMAS Wonogiri',
            'content' => 'Bagan pengelola LPPM STAIMAS Wonogiri.',
            'icon' => 'fas fa-sitemap',
        ]);

        // 4. PUSAT STUDI DAN UNIT (Dropdown)
        $m4 = MenuItem::create([
            'title' => 'PUSAT STUDI DAN UNIT',
            'slug' => 'pusat-studi-dan-unit',
            'url' => '#',
            'icon' => 'fas fa-flask',
            'order_position' => 4,
            'is_active' => true,
        ]);

        MenuItem::create([
            'parent_id' => $m4->id,
            'title' => 'Pusat Studi BK, Psikologi & Parenting',
            'slug' => 'pusat-studi-bk-parenting',
            'url' => '/pusat-studi/bk-parenting',
            'order_position' => 1,
            'is_active' => true,
        ]);

        MenuItem::create([
            'parent_id' => $m4->id,
            'title' => 'Pusat Studi Gender dan Anak',
            'slug' => 'pusat-studi-gender-anak',
            'url' => '/pusat-studi/gender-anak',
            'order_position' => 2,
            'is_active' => true,
        ]);

        MenuItem::create([
            'parent_id' => $m4->id,
            'title' => 'Pusat Studi Moderasi Beragama',
            'slug' => 'pusat-studi-moderasi-beragama',
            'url' => '/pusat-studi/moderasi-beragama',
            'order_position' => 3,
            'is_active' => true,
        ]);

        MenuItem::create([
            'parent_id' => $m4->id,
            'title' => 'Pusat Studi Kewirausahaan',
            'slug' => 'pusat-studi-kewirausahaan',
            'url' => '/pusat-studi/kewirausahaan',
            'order_position' => 4,
            'is_active' => true,
        ]);

        // 5. DOKUMEN
        MenuItem::create([
            'title' => 'DOKUMEN',
            'slug' => 'dokumen',
            'url' => '/dokumen',
            'icon' => 'fas fa-folder-open',
            'order_position' => 5,
            'is_active' => true,
        ]);

        // 6. DOKUMENTASI
        MenuItem::create([
            'title' => 'DOKUMENTASI',
            'slug' => 'dokumentasi',
            'url' => '/dokumentasi',
            'icon' => 'fas fa-camera',
            'order_position' => 6,
            'is_active' => true,
        ]);

        // 7. PUBLIKASI LPPM (Dropdown)
        $m7 = MenuItem::create([
            'title' => 'PUBLIKASI LPPM',
            'slug' => 'publikasi-lppm',
            'url' => '#',
            'icon' => 'fas fa-book-open',
            'order_position' => 7,
            'is_active' => true,
        ]);

        MenuItem::create([
            'parent_id' => $m7->id,
            'title' => 'Jurnal Al-Basirah',
            'slug' => 'jurnal-al-basirah',
            'url' => '/jurnal-al-basirah',
            'order_position' => 1,
            'is_active' => true,
        ]);

        MenuItem::create([
            'parent_id' => $m7->id,
            'title' => 'Jurnal Li Syabab',
            'slug' => 'jurnal-lisyabab',
            'url' => '/jurnal-lisyabab',
            'order_position' => 2,
            'is_active' => true,
        ]);

        MenuItem::create([
            'parent_id' => $m7->id,
            'title' => 'Ketua Jurnal LPPM',
            'slug' => 'ketua-jurnal-lppm',
            'url' => '/jurnal-lppm',
            'order_position' => 3,
            'is_active' => true,
        ]);
    }
}