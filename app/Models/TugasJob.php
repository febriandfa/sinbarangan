<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TugasJob extends Model
{
    use HasFactory;

    protected $table = 'tugas_jobs';

    protected $fillable = [
        'tugas_answer_id',
        'user_id',
        'nama',
        'deadline',
        'status'
    ];

    public function tugas_answers() {
        return $this->belongsTo(TugasAnswer::class, 'tugas_answer_id', 'id');
    }

    public function users() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
