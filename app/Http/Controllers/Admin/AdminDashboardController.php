<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dokumen;
use App\Models\Dokumentasi;
use App\Models\Berita;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalDokumen     = Dokumen::count();
        $totalDokumentasi = Dokumentasi::count();
        $totalBerita      = Berita::count();

        return view('admin.dashboard', compact('totalDokumen', 'totalDokumentasi', 'totalBerita'));
    }

    // ── KELOLA DOKUMEN (FILES / LINKS) ──
    public function indexDokumen()
    {
        $dokumens = Dokumen::latest()->get();
        return view('admin.dokumen.index', compact('dokumens'));
    }

    public function storeDokumen(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,zip,rar|max:15360',
            'file_url' => 'nullable|string|max:2048',
        ]);

        $filePath = '';
        $fileType = 'pdf';

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileType = strtolower($file->getClientOriginalExtension());
            $filename = time() . '_' . Str::slug($request->judul) . '.' . $fileType;
            $destinationPath = public_path('uploads/dokumen');
            
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0777, true, true);
            }
            
            $file->move($destinationPath, $filename);
            $filePath = 'uploads/dokumen/' . $filename;
        } elseif ($request->filled('file_url')) {
            $filePath = trim($request->file_url);
            $fileType = 'link';
        } else {
            return back()->withErrors(['file' => 'Pilih file dokumen lokal ATAU tempelkan (paste) link URL dokumen.'])->withInput();
        }

        Dokumen::create([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'file_path' => $filePath,
            'file_type' => $fileType,
        ]);

        return back()->with('success', 'Dokumen "' . $request->judul . '" berhasil ditambahkan.');
    }

    public function deleteDokumen(int $id)
    {
        $dok = Dokumen::findOrFail($id);
        if ($dok->file_path && !Str::startsWith($dok->file_path, ['http://', 'https://']) && File::exists(public_path($dok->file_path))) {
            File::delete(public_path($dok->file_path));
        }

        $judul = $dok->judul;
        $dok->delete();

        return back()->with('success', 'Dokumen "' . $judul . '" berhasil dihapus.');
    }

    // ── KELOLA DOKUMENTASI (PHOTOS) ──
    public function indexDokumentasi()
    {
        $dokumentasis = Dokumentasi::latest()->get();
        return view('admin.dokumentasi.index', compact('dokumentasis'));
    }

    public function storeDokumentasi(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png,webp,gif|max:5120',
            'foto_url' => 'nullable|string|max:2048',
            'tanggal' => 'nullable|date',
        ]);

        $fotoPath = '';

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . Str::slug($request->judul) . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('uploads/dokumentasi');
            
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0777, true, true);
            }
            
            $file->move($destinationPath, $filename);
            $fotoPath = 'uploads/dokumentasi/' . $filename;
        } elseif ($request->filled('foto_url')) {
            $fotoPath = trim($request->foto_url);
        } else {
            return back()->withErrors(['foto' => 'Pilih file gambar lokal ATAU tempelkan (paste) link URL gambar.'])->withInput();
        }

        Dokumentasi::create([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'foto' => $fotoPath,
            'tanggal' => $request->tanggal ?? date('Y-m-d'),
        ]);

        return back()->with('success', 'Foto dokumentasi "' . $request->judul . '" berhasil ditambahkan.');
    }

    public function deleteDokumentasi(int $id)
    {
        $dok = Dokumentasi::findOrFail($id);
        if ($dok->foto && !Str::startsWith($dok->foto, ['http://', 'https://']) && File::exists(public_path($dok->foto))) {
            File::delete(public_path($dok->foto));
        }

        $judul = $dok->judul;
        $dok->delete();

        return back()->with('success', 'Foto dokumentasi "' . $judul . '" berhasil dihapus.');
    }

    public function updateDokumentasi(Request $request, int $id)
    {
        $request->validate([
            'judul'    => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
        ]);

        $dok = Dokumentasi::findOrFail($id);
        $dok->update([
            'judul'    => $request->judul,
            'kategori' => $request->kategori,
        ]);

        return back()->with('success', 'Nama foto "' . $request->judul . '" berhasil diperbarui.');
    }

    // ── KELOLA BERITA ──
    public function fetchBeritaLink(Request $request): \Illuminate\Http\JsonResponse
    {
        $url = trim($request->input('url', ''));

        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            return response()->json(['error' => 'URL tidak valid.'], 422);
        }

        try {
            $context = stream_context_create([
                'http' => [
                    'timeout'         => 8,
                    'follow_location' => true,
                    'user_agent'      => 'Mozilla/5.0 (compatible; LPPMBot/1.0)',
                ],
                'ssl' => [
                    'verify_peer'      => false,
                    'verify_peer_name' => false,
                ],
            ]);

            $html = @file_get_contents($url, false, $context);

            if (!$html) {
                return response()->json(['error' => 'Tidak bisa mengakses URL tersebut.'], 422);
            }

            $data = ['judul' => '', 'ringkasan' => '', 'foto' => ''];

            // OG Title → fallback <title>
            if (preg_match('/<meta[^>]+property=["\']og:title["\'][^>]+content=["\'](.*?)["\']/si', $html, $m)) {
                $data['judul'] = html_entity_decode(trim($m[1]), ENT_QUOTES);
            } elseif (preg_match('/<title[^>]*>(.*?)<\/title>/si', $html, $m)) {
                $data['judul'] = html_entity_decode(trim($m[1]), ENT_QUOTES);
            }

            // OG Description → fallback meta description
            if (preg_match('/<meta[^>]+property=["\']og:description["\'][^>]+content=["\'](.*?)["\']/si', $html, $m)) {
                $data['ringkasan'] = html_entity_decode(trim($m[1]), ENT_QUOTES);
            } elseif (preg_match('/<meta[^>]+name=["\']description["\'][^>]+content=["\'](.*?)["\']/si', $html, $m)) {
                $data['ringkasan'] = html_entity_decode(trim($m[1]), ENT_QUOTES);
            }

            // OG Image
            if (preg_match('/<meta[^>]+property=["\']og:image["\'][^>]+content=["\'](.*?)["\']/si', $html, $m)) {
                $data['foto'] = trim($m[1]);
            }

            return response()->json($data);
        } catch (\Throwable $e) {
            return response()->json(['error' => 'Gagal: ' . $e->getMessage()], 500);
        }
    }

    public function indexBerita()
    {
        $beritas = Berita::latest()->get();
        return view('admin.berita.index', compact('beritas'));
    }

    public function createBerita()
    {
        return view('admin.berita.create');
    }

    public function storeBerita(Request $request)
    {
        $request->validate([
            'judul'     => 'required|string|max:255',
            'kategori'  => 'nullable|string|max:100',
            'ringkasan' => 'nullable|string|max:500',
            'isi'       => 'required|string',
            'foto'      => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'tanggal'   => 'required|date',
            'published' => 'nullable',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . Str::slug($request->judul) . '.' . $file->getClientOriginalExtension();
            $dest = public_path('uploads/berita');
            if (!File::exists($dest)) File::makeDirectory($dest, 0777, true, true);
            $file->move($dest, $filename);
            $fotoPath = 'uploads/berita/' . $filename;
        } elseif ($request->filled('foto_url_external')) {
            $externalUrl = trim($request->input('foto_url_external'));
            $fotoPath = $this->downloadOrKeepExternalImage($externalUrl, $request->judul);
        }

        Berita::create([
            'judul'     => $request->judul,
            'slug'      => Berita::generateSlug($request->judul),
            'kategori'  => $request->kategori ?? 'Umum',
            'ringkasan' => $request->ringkasan,
            'isi'       => $request->isi,
            'foto'      => $fotoPath,
            'tanggal'   => $request->tanggal,
            'published' => $request->input('published', '0') == '1',
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function editBerita(int $id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.edit', compact('berita'));
    }

    public function updateBerita(Request $request, int $id)
    {
        $berita = Berita::findOrFail($id);

        $request->validate([
            'judul'     => 'required|string|max:255',
            'kategori'  => 'nullable|string|max:100',
            'ringkasan' => 'nullable|string|max:500',
            'isi'       => 'required|string',
            'foto'      => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'tanggal'   => 'required|date',
            'published' => 'nullable',
        ]);

        $fotoPath = $berita->foto;
        if ($request->hasFile('foto')) {
            if ($fotoPath && !Str::startsWith($fotoPath, ['http://', 'https://']) && File::exists(public_path($fotoPath))) {
                File::delete(public_path($fotoPath));
            }
            $file = $request->file('foto');
            $filename = time() . '_' . Str::slug($request->judul) . '.' . $file->getClientOriginalExtension();
            $dest = public_path('uploads/berita');
            if (!File::exists($dest)) File::makeDirectory($dest, 0777, true, true);
            $file->move($dest, $filename);
            $fotoPath = 'uploads/berita/' . $filename;
        } elseif ($request->filled('foto_url_external')) {
            $externalUrl = trim($request->input('foto_url_external'));
            if ($externalUrl !== $berita->foto) {
                if ($fotoPath && !Str::startsWith($fotoPath, ['http://', 'https://']) && File::exists(public_path($fotoPath))) {
                    File::delete(public_path($fotoPath));
                }
                $fotoPath = $this->downloadOrKeepExternalImage($externalUrl, $request->judul);
            }
        }

        $berita->update([
            'judul'     => $request->judul,
            'kategori'  => $request->kategori ?? 'Umum',
            'ringkasan' => $request->ringkasan,
            'isi'       => $request->isi,
            'foto'      => $fotoPath,
            'tanggal'   => $request->tanggal,
            'published' => $request->input('published', '0') == '1',
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    private function downloadOrKeepExternalImage(string $url, string $judul): string
    {
        try {
            $context = stream_context_create([
                'http' => [
                    'timeout'         => 10,
                    'follow_location' => true,
                    'user_agent'      => 'Mozilla/5.0 (compatible; LPPMBot/1.0)',
                ],
                'ssl' => [
                    'verify_peer'      => false,
                    'verify_peer_name' => false,
                ],
            ]);
            $contents = @file_get_contents($url, false, $context);
            if ($contents !== false && strlen($contents) > 0) {
                $ext = 'jpg';
                $pathOnly = parse_url($url, PHP_URL_PATH);
                if ($pathOnly) {
                    $extCandidate = strtolower(pathinfo($pathOnly, PATHINFO_EXTENSION));
                    if (in_array($extCandidate, ['jpg', 'jpeg', 'png', 'webp', 'gif'])) {
                        $ext = $extCandidate;
                    }
                }
                $filename = time() . '_' . Str::slug($judul) . '.' . $ext;
                $dest = public_path('uploads/berita');
                if (!File::exists($dest)) {
                    File::makeDirectory($dest, 0777, true, true);
                }
                File::put($dest . '/' . $filename, $contents);
                return 'uploads/berita/' . $filename;
            }
        } catch (\Throwable $e) {
            // fallback to raw URL
        }
        return $url;
    }

    public function deleteBerita(int $id)
    {
        $berita = Berita::findOrFail($id);
        if ($berita->foto && File::exists(public_path($berita->foto))) {
            File::delete(public_path($berita->foto));
        }
        $berita->delete();
        return back()->with('success', 'Berita berhasil dihapus.');
    }
}