<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aircraft extends Model
{
    use HasFactory;

    protected $table = 'aircraft';
    protected $fillable = [
        'forms_id',
        'aircraft',
    ];

    public function form()
    {
        return $this->belongsTo(Form::class, 'forms_id');
    }
}
