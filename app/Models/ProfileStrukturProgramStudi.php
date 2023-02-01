<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileStrukturProgramStudi extends Model
{
    use HasFactory;
    protected $table = 'profile_struktur_program_studi';
    protected $fillable = [
        'name',
        'jabatan',
        'photo'
    ];
}
