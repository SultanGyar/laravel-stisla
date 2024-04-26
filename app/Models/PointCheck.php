<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointCheck extends Model
{
    use HasFactory;

    protected $table = 'tbpoint_check';

    protected $fillable = [
        'nama_point_check',
    ];
}
