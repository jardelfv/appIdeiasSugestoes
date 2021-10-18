<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('site.index');
});

Auth::routes();

Route::get('/', 'Home\HomeController@index')->name('site.home');
Route::get('/Painel', 'Painel\PainelController@index')->name('Painel.index');
//Route::get('/Painel/Usuarios', 'Painel\PainelController@viewUsuarios')->name('Painel.Usuarios.index');
Route::get('/Painel/usuario', 'Painel\UserController@listAllUsers')->name('Painel.users.listAllUsers');
Route::get('/Painel/usuario/novo', 'Painel\UserController@addUser')->name('Painel.users.addUser');
Route::get('/Painel/usuario/editar/{user}', 'Painel\UserController@editUser')->name('Painel.users.editUser');
Route::get('/Painel/usuario/{user}', 'Painel\UserController@listUser')->name('Painel.users.listUser');
Route::post('/Painel/usuario/cadastrousuario', 'Painel\UserController@addUserPrivilege')->name('Painel.users.addUserPrivilege');
Route::post('/Painel/usuario/cadastrousuariocomum', 'Painel\UserController@addUserDefault')->name('Painel.users.addUserDefault');
Route::put('/Painel/usuario/edit/{user}', 'Painel\UserController@edit')->name('Painel.users.edit');
Route::delete('/Painel/usuario/destroy/{user}', 'Painel\UserController@destroy')->name('Painel.users.destroy');


Route::get('/Painel/sugestao', 'Painel\SugestaoController@listAllSugestoes')->name('Painel.sugestoes.listAllSugestoes');
Route::get('/Painel/sugestao/listar', 'Painel\SugestaoController@minhasSugestoes')->name('Painel.sugestoes.minhasSugestoes');
Route::get('/Painel/sugestao/avaliar', 'Painel\SugestaoController@avaliarSugestoes')->name('Painel.sugestoes.avaliarSugestoes');
Route::get('/Painel/sugestao/cadastrar', 'Painel\SugestaoController@addSugestao')->name('Painel.sugestoes.addSugestao');
Route::get('/Painel/sugestao/editar/{sugestao}', 'Painel\SugestaoController@editSugestao')->name('Painel.sugestoes.editSugestao');
Route::put('/Painel/sugestao/edit/{sugestao}', 'Painel\SugestaoController@edit')->name('Painel.sugestoes.edit');
Route::get('/Painel/sugestao/{sugestao}', 'Painel\SugestaoController@listSugestao')->name('Painel.sugestoes.listSugestao');

Route::post('/Painel/sugestao/store', 'Painel\SugestaoController@storeSugestao')->name('Painel.sugestoes.storeSugestao');
Route::delete('/Painel/sugestao/destroy/{sugestao}', 'Painel\SugestaoController@destroy')->name('Painel.sugestoes.destroy');
Route::delete('/Painel/sugestao/destroy/{request, id}', 'Painel\SugestaoController@delete')->name('Painel.sugestoes.delete');


//----------------------------------------envio de e-mails-------------------
/*
Route::get('envio-email', function () {
    $user = Auth::user();

    return new \App\Mail\novaSugestao($user);
});
*/

//---------------------------------------------------------------------------

Route::get('/login-site', function () {
    return view('site.login-site');
})->name('site.login-site');

Route::get('/sobre', function () {
    return view('site.sobre');
})->name('site.sobre');

Route::get('/cadastro', function () {
    return view('site.cadastro');
})->name('site.cadastro');
Auth::routes();

Route::get('/home', 'HomeController@index');
