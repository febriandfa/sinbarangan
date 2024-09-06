<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;

    protected $table = 'tugases';

    protected $fillable = [
        'nama',
        'deskripsi',
        'deadline'
    ];

    public function tugas_answers() {
        return $this->hasMany(TugasAnswer::class, 'tugas_id', 'id');
    }
}
