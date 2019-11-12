<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'nombre', 'descripcion', 'departamento_id', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function asignaturas()
    {
        return $this->hasMany(Asignatura::class);
    }
}
