<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'titulo', 'acta', 'fecha', 'iniciacion', 'terminacion', 'hora_semana', 'descripcion', 'institucion', 'item_id', 'plandetrabajo_id', 'created_at', 'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function plandetrabajo()
    {
        return $this->belongsTo(Plandetrabajo::class);
    }
}
