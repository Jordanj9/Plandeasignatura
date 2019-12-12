<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plandetrabajo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'docente_id', 'periodo_id', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }

    public function periodo()
    {
        return $this->belongsTo(Periodo::class);
    }

    public function horarios()
    {
        return $this->hasMany(Horario::class);
    }

    public function actividaddocentes()
    {
        return $this->hasMany(Actividaddocente::class);
    }

    public function trabajos()
    {
        return $this->hasMany(Trabajo::class);
    }
}
