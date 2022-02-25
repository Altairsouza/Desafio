<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main;

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

Route::get('/', [Main::class, 'index'])->name('index');
Route::get('/login', [Main::class, 'login'])->name('login');
Route::post('/login_submit', [Main::class, 'login_submit'])->name('login_submit');
Route::get('home', [Main::class, 'home'])->name('home');
Route::get('/logout', [Main::class, 'logout'])->name('logout');





Route::get('/novo_usuario', [Main::class, 'novo_usuario'])->name('novo_usuario');
Route::post('/novo_usuario', [Main::class, 'novo_cadastro'])->name('novo_cadastro');
Route::get('/editar_membro/{id_usuario}', [Main::class, 'editar_membro'])->name('editar_membro');
Route::post('/edite', [Main::class, 'edite'])->name('edite')->middleware('auth');
Route::get('/deletar/{id_usuario}', [Main::class, 'deletar'])->name('deletar');






Route::get('/telefone_lista', [Main::class, 'telefone'])->name('telefone');
Route::get('/deletar_telefone/{id_telefone}', [Main::class, 'delete_telefone'])->name('deletar_telefone');

Route::get('/endereco_lista', [Main::class, 'endereco'])->name('endereco');























