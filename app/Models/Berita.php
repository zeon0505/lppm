<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'beritas';

    protected $fillable = [
        'judul',
        'slug',
        'kategori',
        'ringkasan',
        'isi',
        'foto',
        'tanggal',
        'published',
    ];

    protected $casts = [
        'tanggal'   => 'date',
        'published' => 'boolean',
    ];

    public static function generateSlug(string $judul): string
    {
        $slug = Str::slug($judul);
        $count = static::where('slug', 'like', $slug . '%')->count();
        return $count ? $slug . '-' . ($count + 1) : $slug;
    }
}

