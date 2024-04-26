<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peralatan extends Model
{
    use HasFactory;

    protected $table = 'peralatan';

    protected $fillable = [
        'id_alat',
        'nama_alat',
        'id_kategori_alat',
    ];

    public function fkategori()
    {
        return $this->belongsTo(KategoriPeralatan::class, 'id_kategori_alat');
    }
}
