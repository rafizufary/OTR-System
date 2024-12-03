<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'input_date',
        'address',
        'birth_place',
        'birth_date',
        'lastedu',
        'phone',
        'companyid',
        'image',
        'laca',
        'laca_number',
        'validy',
        'scope',
        'ame_number',
        'vut',
        'hft_year',
        'sms_year',
        'etops_year',
        'rii_year',
        'status_id',
        'checked_by',
        'checked_at',
        'assessment_by',
        'assessment_at'
    ];

    public function trainingType()
    {
        return $this->hasMany(TrainingType::class, 'forms_id');
    }

    public function License()
    {
        return $this->hasMany(License::class, 'forms_id');
    }

    public function Aircraft()
    {
        return $this->hasMany(Aircraft::class, 'forms_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function checkedBy()
    {
        return $this->belongsTo(User::class, 'checked_by');
    }

    public function Assessment()
    {
        return $this->hasMany(Assessment::class, 'forms_id');
    }

    public function assessmentBy()
    {
        return $this->belongsTo(User::class, 'assessment_by');
    }


}
