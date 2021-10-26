<?php

namespace App\Http\Requests;


use App\Providers\ValidatorServiceProvider;
use Illuminate\Foundation\Http\FormRequest;

class StoreRegisterRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'matricula' => 'required|exists:matriz_matriculas,matricula',
            'password' => 'required|min:6|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'matricula.required' => 'O campo matrícula é obrigatório.',
            'matricula.exists' => 'Matricula não encontrada.',
            'password.required' => 'O campo senha é obrigatório.',
        ];
    }

}
