<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    protected $fillable = ['id', 'nombre', 'descripcion', 'plandeasignatura_id', 'created_at', 'updated_at'];

    public function plandeasignatura()
    {
        return $this->belongsTo(Plandeasignatura::class);
    }

    public function ejetematicos()
    {
        return $this->hasMany(Ejetematico::class);
    }

    public function semanas()
    {
        return $this->hasMany(Semana::class);
    }

}
