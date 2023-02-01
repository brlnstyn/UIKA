<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiziPeluangKerja extends Model
{
    use HasFactory;
    protected $table = 'gizi_peluang_kerja';
    protected $fillable = [
        'name',
        'description',
    ];
}
