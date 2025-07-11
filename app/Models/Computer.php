<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    protected $table = 'computers';

    protected $fillable = [
        'name',
        'brand',



    ];

 
    public function aprendices()
    {
        return $this->hasOne(Aprendice::class);
    }
}
