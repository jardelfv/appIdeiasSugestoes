<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\StoreRegisterRequest;
use App\User;
use App\Matriculamatriz;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Para onde redirecionar os usuários após o registrar.
     *
     * @var string
     */
    protected $redirectTo = '/Painel';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->middleware('guest');
    }

    public function store(StoreRegisterRequest $request){

        $dataform = $request->all();
        if($dataform){
            // validar os dados do form
            $this->validate($request, $this->user->rules);
            // salvar os dados
            $this->create($dataform);

            return view('auth.login');
        }else{

            return view('auth.registrar');
        }
    }

    public function registrationForm(){
        return view('auth.registrar');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    /*
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:5|confirmed',
        ]);
    }
    */

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'matricula' => $data['matricula'],

        ]);
    }


    public function addUser(Request $request){

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->matricula = $request->matricula;
        $user->tipo = "comum";
        $user->password = Hash::make($request->password);
        $user->save();

    }

}
