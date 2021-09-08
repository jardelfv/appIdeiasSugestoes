<?php

namespace App\Http\Controllers\Painel;

use App\Sugestao;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Hash;

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
        return view('Painel.sugestoes.listSugestao', [
            'sugestao'=> $sugestao
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSugestao(Request $request)
    {
        $sugestao = new Sugestao();
        //$sugestao->user()->id = 1;
        $sugestao->titulo = $request->titulo;
        $sugestao->descricao = $request->descricao;
        $sugestao->tipo = $request->tipo;
        $sugestao->status = $request->status;

        $sugestao->save();

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


}
