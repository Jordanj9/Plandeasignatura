<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividaddocente extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'nombre', 'tipo', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    public function horarios()
    {
        return $this->hasMany(Horario::class);
    }

    public function planesdetrabajo()
    {
        return $this->belongsToMany(Plandetrabajo::class,'actividaddocentes_plandetrabajos')
             ->withPivot('valor');
    }
}
