<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiziVisi extends Model
{
    use HasFactory;
    protected $table = 'gizi_visi';
    protected $fillable = [
        'visi'
    ];
}
