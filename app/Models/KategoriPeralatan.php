<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPeralatan extends Model
{
    use HasFactory;

    protected $table = 'kategori_peralatan';

    protected $fillable = [
        'kategori_alat',
    ];
}
