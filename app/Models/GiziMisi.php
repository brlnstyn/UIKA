<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiziMisi extends Model
{
    use HasFactory;
    protected $table = 'gizi_misi';
    protected $fillable = [
        'misi'
    ];
}
