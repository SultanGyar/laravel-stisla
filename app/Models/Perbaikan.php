<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perbaikan extends Model
{
    use HasFactory;
    protected $table = 'perbaikan';

    protected $fillable = [
        'id_perbaikan',
        'id_user',
        'tanggal',
        'nama_alat',
        'id_alat_form',
        'nama_pelapor',
        'kelas',
        'keterangan',
    ];

    public function fuser()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function fperalatan()
    {
        return $this->belongsTo(Peralatan::class, 'id_alat_form');
    }
}
