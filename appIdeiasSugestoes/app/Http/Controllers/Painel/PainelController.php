<?php

namespace App\Http\Controllers\Painel;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PainelController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $request;
    public $usuarios;
    public function __construct(Request $request, User $usuarios)
    {
        $this->middleware('auth');
        $this->request = $request;
        $this->usuarios = $usuarios;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // requer que o usuário esteja autenticado
        $user = Auth()->User();
        return view('Painel.index', compact('user'));
    }

    public function viewUsuarios()
    {
        // requer que o usuário esteja autenticado
        $user = Auth()->User();
        // para descobrir a uri atual e pegar a segunda posição
        $uri = $this->request->route()->uri();
        $exploder = explode('/', $uri);
        $urlAtual = $exploder[1];
        
        // laravel consulta all na tabela de usuários
        $usuarios = $this->usuarios->all();

        return view('Painel.Usuarios.index', compact('user', 'urlAtual', 'usuarios'));
    }
}