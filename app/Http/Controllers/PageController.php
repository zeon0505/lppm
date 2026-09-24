<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokumen;
use App\Models\Dokumentasi;

class PageController extends Controller
{
    public function home()
    {
        $berita = [
            [
                'kategori' => 'Pengumuman',
                'tanggal' => '15 September 2026',
                'judul' => 'Penerimaan Proposal Penelitian dan Pengabdian Dosen STAIMAS Wonogiri Tahun 2026',
                'ringkasan' => 'LPPM STAIMAS Wonogiri membuka penerimaan proposal hibah penelitian dan pengabdian masyarakat interdisipliner bagi seluruh dosen tetap.',
            ],
            [
                'kategori' => 'Publikasi',
                'tanggal' => '02 September 2026',
                'judul' => 'Peluncuran Jurnal Al Basirah dan Jurnal Lisyabab Edisi Terbitan Terbaru',
                'ringkasan' => 'Publikasi artikel ilmiah hasil riset dosen dan pengabdian masyarakat mahasiswa resmi diterbitkan pada portal E-Journal LPPM STAIMAS.',
            ],
            [
                'kategori' => 'Kegiatan',
                'tanggal' => '20 Agustus 2026',
                'judul' => 'Workshop Penulisan Karya Tulis Ilmiah & Pendampingan HAKI Dosen',
                'ringkasan' => 'Kegiatan bimbingan teknis penyusunan naskah jurnal terindeks serta fasilitasi pengurusan Hak Kekayaan Intelektual bagi para peneliti.',
            ],
        ];

        return view('home', compact('berita'));
    }

    public function dokumen()
    {
        $dokumens = Dokumen::latest()->get();
        return view('pages.dokumen', compact('dokumens'));
    }

    public function dokumentasi()
    {
        $dokumentasis = Dokumentasi::latest()->get();
        return view('pages.dokumentasi', compact('dokumentasis'));
    }

    public function selayangPandang() { return view('pages.selayang-pandang'); }
    public function sejarah() { return view('pages.sejarah'); }
    public function visiMisi() { return view('pages.visi-misi'); }
    public function struktur() { return view('pages.struktur'); }
    public function programKebijakan() { return view('pages.program-kebijakan'); }
    public function pusatStudiA() { return view('pages.pusat-studi-bk-parenting'); }
    public function pusatStudiB() { return view('pages.pusat-studi-gender-anak'); }
    public function pusatStudiC() { return view('pages.pusat-studi-moderasi-beragama'); }
    public function pusatStudiD() { return view('pages.pusat-studi-kewirausahaan'); }
    public function ketuaJurnal() { return view('pages.ketua-jurnal-lppm'); }
    public function jurnalAlBasirah() { return view('pages.jurnal-al-basirah'); }
    public function jurnalLisyabab() { return view('pages.jurnal-lisyabab'); }
}