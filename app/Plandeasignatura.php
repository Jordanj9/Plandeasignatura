<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plandeasignatura extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'dodencia_directa', 'trabajo_independiente', 'trabajo_semestral',
        'corequisitos', 'prerequisitos', 'presentacion', 'justificacion',
        'objetivogeneral', 'objetivoespecificos', 'competencias', 'metodologias',
        'estrategias', 'periodo_id', 'asignatura_id', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    public function periodo()
    {
        return $this->belongsTo(Periodo::class);
    }

    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class);
    }

    public function unidades()
    {
        return $this->hasMany(Unidad::class);
    }

    public function plandedesarrollos()
    {
        return $this->hasMany(Plandedesarrolloasignatura::class);
    }
}
