<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category_id',
        'duration',
        'exam_date',
        'exam_end_date',
        'student_status',
        'staus',
    ];

    // relation with categoy model 
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    // relation with Option model 
    public function question()
    {
        return $this->hasMany(Questions::class);
    }
}
