<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dokumen;
use App\Models\Dokumentasi;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalDokumen = Dokumen::count();
        $totalDokumentasi = Dokumentasi::count();

        return view('admin.dashboard', compact('totalDokumen', 'totalDokumentasi'));
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

    public function deleteDokumen($id)
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

    public function deleteDokumentasi($id)
    {
        $dok = Dokumentasi::findOrFail($id);
        if ($dok->foto && !Str::startsWith($dok->foto, ['http://', 'https://']) && File::exists(public_path($dok->foto))) {
            File::delete(public_path($dok->foto));
        }

        $judul = $dok->judul;
        $dok->delete();

        return back()->with('success', 'Foto dokumentasi "' . $judul . '" berhasil dihapus.');
    }
}