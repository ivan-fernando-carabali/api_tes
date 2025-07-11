<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aprendice extends Model
{
    protected $table = 'aprendices';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'computer_id',
        'course_id',
    ];

    public function computer()
    {
        return $this->hasOne(Computer::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
