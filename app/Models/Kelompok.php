<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelompok extends Model
{
    use HasFactory;

    protected $table = 'kelompoks';

    protected $fillable = [
        'nama',
        'kelas',
        'kuota'
    ];

    public function members() {
        return $this->hasMany(KelompokMember::class, 'kelompok_id', 'id');
    }
}
