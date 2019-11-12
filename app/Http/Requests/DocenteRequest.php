<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocenteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tipo_documeto' => 'required',
            'identificacion' => 'required|max:12',
            'primer_nombre' => 'required|max:20',
            'segundo_nombre' => 'max:20',
            'primer_apellido' => 'required|max:20',
            'segundo_apellido' => 'max:20',
            'email' => 'required|max:100',
            'departamento_id' => 'required'
        ];
    }
}
