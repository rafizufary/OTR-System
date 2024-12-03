<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;

    protected $table = 'assessment';
    protected $fillable = [
        'forms_id',
        'question',
        'score',
    ];

    public function form()
    {
        return $this->belongsTo(Form::class, 'forms_id');
    }
}
