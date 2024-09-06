<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TugasGrade extends Model
{
    use HasFactory;

    protected $table = 'tugas_grades';

    protected $fillable = [
        'tugas_answer_id',
        'nilai',
        'feedback'
    ];
}
