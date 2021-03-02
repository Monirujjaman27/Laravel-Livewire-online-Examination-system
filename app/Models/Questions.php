<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    use HasFactory;
    protected $fillable = [
        'exams_id',
        'name',  
        'staus',
    ];

    // relation with exam model 
    public function Exam()
    {
        return $this->belongsTo(Exam::class);
    }
    // relation with Option model 
    public function options()
    {
        return $this->hasMany(Option::class);
    }
}
