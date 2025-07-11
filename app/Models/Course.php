<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    protected $table = 'courses';

    protected $fillable = [
        'course_number',
        'day',
        'area_id',
        'training_center_id',
    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function trainingCenter()
    {
        return $this->belongsTo(TrainingCenter::class);
    }

    public function aprendices()
    {
        return $this->hasMany(Aprendice::class);
    }
}
