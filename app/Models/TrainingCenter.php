<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingCenter extends Model
{
 protected $table = 'training_centers';

    protected $fillable = [
        'name',
        'location',
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }
}
