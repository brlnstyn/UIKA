<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KesmasListDosen extends Model
{
    use HasFactory;
    protected $table = 'kesmas_list_dosen';
    protected $fillable = [
        'nidn',
        'name',
        'jabatan'
    ];
}
