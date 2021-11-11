<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSugestaoRequest extends FormRequest
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
            'titulo' => 'required|min:3',
            'descricao' => 'required|min:4',
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'Título: Este campo é obrigatório',
            'titulo.min' => 'Título: Este campo é obrigatório, no mínimo :min caracteres',
            'descricao.required' => 'Descrição: Este campo é obrigatório',
            'descricao.min' => 'Descrição: Este campo é obrigatório, no mínimo :min caracteres',
        ];
    }
}
