<?php

namespace App\Http\Controllers\Painel;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Hash;

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

    public function listAllUsers(){
        $users = User::all();

        return view('Painel.users.listAllUsers', [
            'users'=> $users
        ]);
    }

    public function listUser(User $user){
        return view('Painel.users.listUser', [
            'user'=> $user
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
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('Painel.users.listAllUsers');
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

        $user->save();
        return redirect()->route('Painel.users.listAllUsers');
    }

    public function destroy(User $user){
        $user->delete();
        return redirect()->route('Painel.users.listAllUsers');
    }
}
