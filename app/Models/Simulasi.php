<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simulasi extends Model
{
    use HasFactory;

    protected $table = 'simulasis';

    protected $fillable = [
        'judul',
        'deskripsi',
        'link'
    ];
}
