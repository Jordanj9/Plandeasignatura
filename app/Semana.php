<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semana extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'semana', 'temas_trabajo', 'estrategias', 'competencias', 'evaluacion',
        'bibliografia', 'unidad_id', 'plandedesarrolloasignatura_id', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    public function plandedesarrolloasignatura()
    {
        return $this->belongsTo(Plandedesarrolloasignatura::class);
    }

//    public function plandedesarrollos()
//    {
//        return $this->hasMany(Plandedesarrolloasignatura::class);
//    }

    public function ejetematicos()
    {
        return $this->belongsToMany(Ejetematico::class, 'ejetematicosemana');
    }

    public function unidad()
    {
        return $this->belongsTo(Unidad::class);
    }

    public function evaluacions()
    {
        return $this->hasMany(Evaluacion::class);
    }
}
