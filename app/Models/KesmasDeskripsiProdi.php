<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KesmasDeskripsiProdi extends Model
{
    use HasFactory;
    protected $table = 'kesmas_deskripsi_prodi';
    protected $fillable = [
        'description',
        'akreditasi',
        'prospek_lulusan',
        'photo'
    ];
}
