<?php

namespace App\Http\Controllers\Painel;

use App\Mail\novaSugestao;
use App\Sugestao;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class SugestaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $request;
    public $user;
    public function __construct(Request $request, User $user, Sugestao $sugestao)
    {
        $this->middleware('auth');
        $this->request = $request;
        $this->$user = $user;
        $this->$sugestao = $sugestao;
    }


    public function listAllSugestoes()
    {
        $sugestoes = Sugestao::all();


        return view('Painel.sugestoes.listAllSugestoes', [
            'sugestoes' =>$sugestoes
        ]);
    }

    public function listSugestao(Sugestao $sugestao){
        $comum = 'comum';
        $admin = 'admin';

        if(Auth::user()->tipo == $admin){
            $this->authorize('user-admin', $sugestao);
        }elseif (Auth::user()->tipo == $comum){
            $this->authorize('user-comum', $sugestao);
        }else{

        }

        return view('Painel.sugestoes.listSugestao', [
            'sugestao'=> $sugestao
        ]);
    }

    public function minhasSugestoes(){
        $comum = 'comum';
        $admin = 'admin';
        $sugestoes = Sugestao::all();
        //$sugestoes = $aux->where('id', '=', Auth::user()->id);


        return view('Painel.sugestoes.minhasSugestoes', [
            'sugestoes'=> $sugestoes
        ]);
    }

    public function implantadas(){
        $comum = 'comum';
        $admin = 'admin';
        //$sugestoes = DB::table('sugestoes')->where('status', '=', '3');
        //$sugestoes = DB::select('select * from sugestoes where status = :status', ['status' => 1]);
        $sugestoes = Sugestao::where('status', '3')->get();

        return view('Painel.sugestoes.implantadas', [
            'sugestoes'=> $sugestoes
        ]);
    }

    public function avaliarSugestoes(){
        $sugestoes = Sugestao::all();

        return view('Painel.sugestoes.avaliarSugestoes', [
            'sugestoes' =>$sugestoes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addSugestao(){
        $sugestao = new Sugestao();

        return view('Painel.sugestoes.addSugestao', [
            'sugestao'=> $sugestao
        ]);
    }

    public function novaSugestao(){
        $sugestao = new Sugestao();

        return view('Painel.sugestoes.novaSugestao', [
            'sugestao'=> $sugestao
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSugestao(Request $request)
    {
        //$user = User::where('id', $id)->first();
        $user = Auth::user();
        //dd(env('MAIL_USERNAME'));
        //var_dump($user);
        $sugestao = new Sugestao();
        $sugestao->user = Auth::user()->id;
        $sugestao->data_aprovacao = null;
        $sugestao->titulo = $request->titulo;
        $sugestao->descricao = $request->descricao;
        $sugestao->tipo = $request->tipo;
        $sugestao->status = $request->status;

        $sugestao->save();

        Mail::to($user->email)->send(new novaSugestao(Auth::user()));

        return redirect()->route('Painel.sugestoes.listAllSugestoes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Sugestao $sugestao)
    {

    }

    public function editSugestao(Sugestao $sugestao){
        return view('Painel.sugestoes.editSugestao', [
            'sugestao'=> $sugestao
        ]);
    }

    public function edit(Sugestao $sugestao, Request $request){

        /*
        if($request->status > 1){
            $sugestao->titulo = $request->titulo;
            $sugestao->descricao = $request->descricao;
            $sugestao->tipo = $request->tipo;
            $sugestao->status = $request->status;
        }else{
            Notification::error("Atenção! Não é possivel editar sua sugestão porque já está em processo de avaliação");
        }
        */
        $sugestao->titulo = $request->titulo;
        $sugestao->descricao = $request->descricao;
        $sugestao->tipo = $request->tipo;
        $sugestao->status = $request->status;

        $sugestao->save();
        return redirect()->route('Painel.sugestoes.listAllSugestoes');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove uma sugestão específica do banco de dados.
     *
     * @param  Sugestao  $sugestao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sugestao $sugestao){
        $sugestao->delete();

        return redirect()->route('Painel.sugestoes.listAllSugestoes');
    }
    public  $sugestao_id;
    public function delete(Request $request, $id){

        $id = $request['sugestao_id'];
        $sugestao = $this->sugestao->find(id);
        $sugestao->delete();

        return redirect()->route('Painel.sugestoes.listAllSugestoes');
    }

}