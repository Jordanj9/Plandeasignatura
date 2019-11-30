<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plandedesarrolloasignatura extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'docente_id', 'plandeasignatura_id', 'semana_id', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    public function semana()
    {
        return $this->belongsTo(Semana::class);
    }

    public function plandeasignatura()
    {
        return $this->belongsTo(Plandeasignatura::class);
    }

    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }
}
