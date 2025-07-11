<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
protected $table = 'teachers';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'training_center_id',
        'area_id',
    ];

    public function trainingCenter()
    {
        return $this->belongsTo(TrainingCenter::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
