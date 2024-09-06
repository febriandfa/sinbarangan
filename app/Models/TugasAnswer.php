<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TugasAnswer extends Model
{
    use HasFactory;

    protected $table = 'tugas_answers';

    protected $fillable = [
        'tugas_id',
        'user_id',
        'kelompok_id',
        'rumusan_masalah',
        'file_presentasi',
        'file_laporan'
    ];

    public function tugas_jobs() {
        return $this->hasMany(TugasJob::class, 'tugas_answer_id', 'id');
    }

    public function users() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function tugases() {
        return $this->belongsTo(Tugas::class, 'tugas_id', 'id');
    }

    public function tugas_grades() {
        return $this->hasOne(TugasGrade::class, 'tugas_answer_id', 'id');
    }
}
