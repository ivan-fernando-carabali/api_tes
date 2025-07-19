<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
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



     //LISTAS BLANCAS
    protected $allowIncluded = ['computer', 'course']; //las posibles Querys que se pueden realizar
    protected $allowFilter = ['id, name', 'email', 'phone'];
    protected $allowSort = ['id', 'name', 'email', 'phone'];

   public function scopeIncluded(Builder $query)
    {
        if (empty($this->allowIncluded) || empty(request('included'))) { // validamos que la lista blanca y la variable included enviada a travez de HTTP no este en vacia.
            return;
        }


        // return request('included');

        $relations  = explode(',', request('included')); //['posts','relation2']//recuperamos el valor de la variable included y separa sus valores por una coma

         //return $relations;


        $allowIncluded = collect($this->allowIncluded); //colocamos en una colecion lo que tiene $allowIncluded en este caso = ['posts','posts.user']

        foreach ($relations as $key => $relationship) { //recorremos el array de relaciones

            if (!$allowIncluded->contains($relationship)) {
                unset($relations[$key]);
            }
        }

       // return $relations;

        $query->with($relations); //se ejecuta el query con lo que tiene $relations en ultimas es el valor en la url de included


}
}
