<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ejetematico extends Model
{
    protected $fillable = ['id', 'nombre', 'unidad_id', 'created_at', 'updated_at'];

    public function unidad()
    {
        return $this->belongsTo(Unidad::class, 'unidad_id', 'id');
    }

    public function semanas()
    {
        return $this->belongsToMany(Semana::class, 'ejetematicosemana');
    }
}
