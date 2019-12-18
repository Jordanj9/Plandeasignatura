<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'dia', 'hora','etiqueta','horario_id', 'actividaddocente_id', 'plandetrabajo_id', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    public function actividaddocente()
    {
        return $this->belongsTo(Actividaddocente::class);
    }

    public function plandetrabajo()
    {
        return $this->belongsTo(Plandetrabajo::class);
    }

    public function asignatura(){
        return $this->belongsTo(Asignatura::class);
    }
}
