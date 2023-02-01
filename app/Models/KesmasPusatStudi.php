<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KesmasPusatStudi extends Model
{
    use HasFactory;
    protected $table = 'kesmas_pusat_studi';
    protected $fillable = [
        'name',
        'jabatan',
        'photo'
    ];
}
