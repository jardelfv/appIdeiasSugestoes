<?php

namespace App\Http\Controllers\Painel;

use App\Sugestao;
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
    public $user;
    public function __construct(Request $request, User $user)
    {
        $this->middleware('auth');
        $this->request = $request;
        $this->$user = $user;
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
        $sugestoes = Sugestao::all();
        $admin = 'admin';

        // breadcrumbs
        $caminhos = [
            ['url'=>'/Painel', 'titulo'=>'Painel'],
            ['url'=>'/Painel/usuario', 'titulo'=>'Usuários'],
        ];

        if($user->tipo == $admin){
            return view('Painel.index', compact('user','caminhos'));
        }else{
            return view('Painel.sugestoes.minhasSugestoes', compact('sugestoes', 'caminhos'));
        }

    }
/*
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

    public function viewSugestoes()
    {
        // requer que o usuário esteja autenticado
        $user = Auth()->User();
        // para descobrir a uri atual e pegar a segunda posição
        $uri = $this->request->route()->uri();
        $exploder = explode('/', $uri);
        $urlAtual = $exploder[1];

        // laravel consulta all na tabela de usuários
        $usuarios = $this->usuarios->all();

        return view('Painel.Sugestoes.index', compact('user', 'urlAtual', 'usuarios'));
    }
*/
}
