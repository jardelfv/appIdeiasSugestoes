<?php

namespace App\Http\Controllers\Painel;

use App\Mail\novaSugestao;
use App\Sugestao;
use App\Http\Controllers\Controller;
use App\User;
use App\Notifications\notificaNovaSugestao;
use Carbon\Carbon;
use App\Http\Requests\StoreSugestaoRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use function Couchbase\defaultDecoder;

class SugestaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $request;
    public $user;
    private $sugestao;
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

        // breadcrumbs
        $caminhos = [
            ['url'=>'/Painel', 'titulo'=>'Painel'],
            ['url'=>'', 'titulo'=>'Listar Sugestões'],
        ];

        return view('Painel.sugestoes.listAllSugestoes', [
            'sugestoes' =>$sugestoes,
            'caminhos' =>$caminhos,
        ]);
    }

    public function listSugestao(Sugestao $sugestao){
        $comum = 'comum';
        $admin = 'admin';

        // breadcrumbs
        $caminhos = [
            ['url'=>'/Painel', 'titulo'=>'Painel'],
            ['url'=>'/Painel/sugestao/listar', 'titulo'=>'Listar Sugestões'],
            ['url'=>'', 'titulo'=>'Detalhes Sugestão'],
        ];

        if(Auth::user()->tipo == $admin){
            $this->authorize('user-admin', $sugestao);
        }elseif (Auth::user()->tipo == $comum){
            $this->authorize('user-comum', $sugestao);
        }else{

        }

        return view('Painel.sugestoes.listSugestao', [
            'sugestao'=> $sugestao,
            'caminhos' =>$caminhos,
        ]);
    }

    public function minhasSugestoes(){
        $comum = 'comum';
        $admin = 'admin';
        $sugestoes = Sugestao::all();
        //$sugestoes = $aux->where('id', '=', Auth::user()->id);

        // breadcrumbs
        $caminhos = [
            ['url'=>'/Painel', 'titulo'=>'Painel'],
            ['url'=>'', 'titulo'=>'Minhas Sugestões'],
        ];

        return view('Painel.sugestoes.minhasSugestoes', [
            'sugestoes'=> $sugestoes,
            'caminhos' =>$caminhos,
        ]);
    }

    public function implantadas(){
        $comum = 'comum';
        $admin = 'admin';
        //$sugestoes = DB::table('sugestoes')->where('status', '=', '3');
        //$sugestoes = DB::select('select * from sugestoes where status = :status', ['status' => 1]);
        $sugestoes = Sugestao::where('status', '3')->get();

        // breadcrumbs
        $caminhos = [
            ['url'=>'/Painel', 'titulo'=>'Painel'],
            ['url'=>'', 'titulo'=>'Sugestões Implantadas'],
        ];

        return view('Painel.sugestoes.implantadas', [
            'sugestoes'=> $sugestoes,
            'caminhos' =>$caminhos,
        ]);
    }

    /**
     * atualizar o atributo status
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateStatus(Request $request){

        $sugestao = Sugestao::find($request->id);
        $sugestao->status = 3;
        $sugestao->save();

        return redirect()->route('Painel.sugestoes.listAllSugestoes');
    }

    /**
     * atualizar o atributo status, 1 para aprovado
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function aprovar(Request $request){

        $sugestao = Sugestao::find($request->id);
        $sugestao->status = 1;
        $sugestao->data_aprovacao = Carbon::now();

        if($sugestao->save()){
            return redirect()->back()->with('success', 'Aprovado com sucesso!');
        }else{
            return redirect()->route('Painel.sugestoes.listAllSugestoes');
        }

    }

    /**
     * atualizar o atributo status, 2 para reprovado
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reprovar(Request $request){

        $sugestao = Sugestao::find($request->id);
        $sugestao->status = 2;
        if($sugestao->save()){
            return redirect()->back()->with('success', 'Reprovado com sucesso!');
        }else{
            return redirect()->back()->with('erro', 'Algo deu errado! não foi possível reprovar');
        }
    }

    public function avaliarSugestoes(){
        $sugestoes = Sugestao::all();

        // breadcrumbs
        $caminhos = [
            ['url'=>'/Painel', 'titulo'=>'Painel'],
            ['url'=>'', 'titulo'=>'Avaliar Sugestões'],
        ];

        return view('Painel.sugestoes.avaliarSugestoes', [
            'sugestoes' =>$sugestoes,
            'caminhos' =>$caminhos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addSugestao(){
        $sugestao = new Sugestao();

        // breadcrumbs
        $caminhos = [
            ['url'=>'/Painel', 'titulo'=>'Painel'],
            ['url'=>'', 'titulo'=>'Cadastrar Sugestões'],
        ];

        return view('Painel.sugestoes.addSugestao', [
            'sugestao'=> $sugestao,
            'caminhos' =>$caminhos,
        ]);
    }

    public function novaSugestao(){
        $sugestao = new Sugestao();

        return view('Painel.sugestoes.novaSugestao', [
            'sugestao'=> $sugestao
        ]);
    }

    /**
     * Crie uma nova instância de sugestão após um registro válido.
     *
     * @param  array  $data
     * @return Sugestao
     */
    protected function create(array $data)
    {
        return Sugestao::create([
            'titulo' => $data['titulo'],
            'descricao' => $data['descricao'],
            'user' => $data['user'],

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSugestaoRequest $request)
    {
        $user = Auth::user();
        $dataform = $request->all();
        if($dataform){
            // salvar os dados
            $recuperaId = $this->create($dataform);
            $sugestao = Sugestao::find($recuperaId->id);
            
            if(Input::hasFile('arquivo')){
                if ($request->file('arquivo')->isValid()){
                    $caminho = $request->file('arquivo')->store('sugestoes/' . $user->id);

                    $sugestao->caminho = $caminho;
                    $sugestao->save();
                }
            }

            //Mail::to($user->email)->send(new novaSugestao($user, $sugestao));
            $user->notify(new notificaNovaSugestao($user, $sugestao));

            return redirect()->route('Painel.sugestoes.minhasSugestoes');
        }else{

            return view('auth.registrar');
        }

        //Mail::to($user->email)->send(new novaSugestao(Auth::user()));


    }

    public function fileShow(Sugestao $sugestao)
    {
        $path = '/app/'.$sugestao->caminho;
        return response()->download(storage_path($path));
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

    public function delete(Request $request){
        $sugestao = Sugestao::find($request->id);

        if($sugestao->delete()){
            return redirect()->back()->with('success', 'Deletado com sucesso!');
        }else{
            return redirect()->back()->with('erro', 'Algo deu errado! não foi possivel deletar');
        }

    }

}
