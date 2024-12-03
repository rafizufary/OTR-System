<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    use HasFactory;

    protected $table = 'license';
    protected $fillable = [
        'forms_id',
        'license_category',
        'card_number',
    ];

    public function form()
    {
        return $this->belongsTo(Form::class, 'forms_id');
    }
}
