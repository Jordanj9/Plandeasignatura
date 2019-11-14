<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'codigo', 'nombre', 'creditos', 'naturaleza', 'habilitable', 'total_hora', 'hora_practica', 'hora_teorica', 'programa_id', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    public function programa()
    {
        return $this->belongsTo(Programa::class);
    }

    public function plandeasignaturas()
    {
        return $this->hasMany(Plandeasignatura::class);
    }
}
