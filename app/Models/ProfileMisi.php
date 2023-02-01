<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileMisi extends Model
{
    use HasFactory;
    protected $table = 'profile_misi';
    protected $fillable = [
        'misi'
    ];
}
