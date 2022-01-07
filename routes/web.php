<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoControlador;
use Illuminate\Http\Request;
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

Route::get('/produtos',[ProdutoControlador::class,'index']);

Route::get('/negado',function(){
    return response("Acesso negado!");
})->name('negado')->middleware('produto');

Route::post('/login', function(Request $request){
    $login_ok = false;
    $admin = false;
    switch($request->input('user')){
        case 'jao':
            $login_ok = $request->input('passwd') === 'senhajoao';
            $admin = true;
            break;
        case 'marcus':
            $login_ok = $request->input('passwd') === 'senhajoao';
            break;
        case 'default':
            $login_ok = false;
            break;
    }
    if ($login_ok) {
        $login = ['user' => $request->input('user')];
        $request->session()->put('login', $login);
        return response('Login Ok', 200);
    }
    else {
        $request->session()->flush();
        return response("Erro no Login", 404);
    }
});

Route::get('/logout', function(Request $request){
    $request->session()->flush();
    return response('Logout Ok', 200);
})->middleware('produto');

