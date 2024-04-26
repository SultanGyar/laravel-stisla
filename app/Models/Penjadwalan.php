<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjadwalan extends Model
{
    use HasFactory;

    protected $table = 'penjadwalan';

    protected $fillable = [
        'id_penjadwalan',
        'tanggal',
        'nama_alat',
        'id_nama_alat',
        'id_point_check',
        'ruangan',
        'tanggal_jadwal',
    ];

    public function fperalatan()
    {
        return $this->belongsTo(Peralatan::class, 'id_nama_alat');
    }

    public function fpointCheck()
    {
        return $this->belongsTo(PointCheck::class, 'id_point_check');
    }
}
