<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'anio', 'periodo', 'fechainicio', 'fechafin', 'fechainicio1',
        'fechafin1', 'fechainicio2', 'fechafin2', 'fechainicio3',
        'fechafin3', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];
}
