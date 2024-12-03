<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingType extends Model
{
    use HasFactory;

    protected $table = 'training_type';
    protected $fillable = [
        'forms_id',
        'course',
        'course_year',
    ];

    public function form()
    {
        return $this->belongsTo(Form::class, 'forms_id');
    }
}
