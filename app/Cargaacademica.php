<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargaacademica extends Model
{
    protected $fillable = ['id', 'docente_id', 'asignatura_id', 'grupo_id', 'periodo_id', 'created_at', 'updated_at'];


    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }

    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class);
    }

    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }

    public function periodo()
    {
        return $this->belongsTo(Periodo::class);
    }

    public function estudiantes()
    {
        return $this->belongsToMany(Estudiante::class, 'cargaacademica_estudiantes');
    }
}
