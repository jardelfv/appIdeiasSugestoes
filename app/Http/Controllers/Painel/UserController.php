<?php

namespace App\Http\Controllers\Painel;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public $request;
    public $user;
    public function __construct(Request $request, User $user)
    {
        $this->middleware('auth');
        $this->request = $request;
        $this->$user = $user;
    }

    protected function create(array $data)
    {

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'matricula' => $data['matricula'],

        ]);
    }

    public function listAllUsers(){
        $users = User::all();

        // breadcrumbs
        $caminhos = [
            ['url'=>'/Painel', 'titulo'=>'Painel'],
            ['url'=>'', 'titulo'=>'Usuários Cadastrados'],
        ];

        // autorização para nível de usuário
        //$this->authorize('listar-usuarios', Auth::user());
        if(Gate::denies('listar-usuarios',Auth::user())){
            abort(403,"Não autorizado");
        }

        return view('Painel.users.listAllUsers', [
            'users'=> $users,
            'caminhos'=> $caminhos,
        ]);
    }

    public function listUser(User $user){
        // breadcrumbs
        $caminhos = [
            ['url'=>'/Painel', 'titulo'=>'Painel'],
            ['url'=>'/Painel/usuario/', 'titulo'=>'Usuário'],
            ['url'=>'', 'titulo'=>'Detalhes Usuário'],
        ];

        return view('Painel.users.listUser', [
            'user'=> $user,
            'caminhos'=> $caminhos,
        ]);
    }

    public function addUser(){
        $user = Auth()->User();
        return view('Painel.users.addUser', [
            'user'=> $user
        ]);
    }

    public function addUserPrivilege(Request $request){

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->matricula = $request->matricula;
        $user->tipo = $request->tipo;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('Painel.users.listAllUsers');
    }

    public function addUserDefault(Request $request){

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->matricula = $request->matricula;
        $user->tipo = $request->tipo;
        $user->password = Hash::make($request->password);
        $user->save();


    }

    public function editUser(User $user){
        return view('Painel.users.editUser', [
            'user'=> $user
        ]);
    }

    public function edit(User $user, Request $request){
        $user->name = $request->name;
        if(filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            $user->email = $request->email;
        }else{
            Notification::error("formato de email inválido!");
        }
        if(!empty($request->password)){
            $user->password = Hash::make($request->password);
        }
        if(!empty($request->tipo)){
            $user->tipo = $request->tipo;
        }

        $user->save();
        return redirect()->route('Painel.users.listAllUsers');
    }

    public function destroy(User $user){
        $user->delete();
        return redirect()->route('Painel.users.listAllUsers');
    }
}
