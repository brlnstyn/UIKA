<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KesmasStrukturProgramStudi extends Model
{
    use HasFactory;
    protected $table = 'kesmas_struktur_program_studi';
    protected $fillable = [
        'name',
        'jabatan',
        'photo'
    ];
}
