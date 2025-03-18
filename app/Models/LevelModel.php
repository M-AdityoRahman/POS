<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelModel extends Model
{
    use HasFactory;

    protected $table = 'm_level'; // Sesuaikan dengan nama tabel
    protected $primaryKey = 'level_id';
    
    protected $fillable = [
        'nama_level', // Sesuaikan dengan kolom tabel
    ];
}
