<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'matricula', 'tipo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'matricula' => 'required|exists:matriz_matriculas,matricula',
            'password' => 'required|min:6|confirmed',
        ];


    public $messages = [
            'name.required' => 'O campo nome é obrigatório.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'matricula.required' => 'O campo matrícula é obrigatório.',
            'matricula.exists' => 'Matricula não encontrada.',
            'password.required' => 'O campo senha é obrigatório.',
        ];

    public function sugestoesUsers(){
        // um para muitos, um usuário tem várias sugestões
        return $this->hasMany(Sugestao::class, 'user', 'id');
    }
}
