<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\ChaveController;
use Illuminate\Support\Facades\Auth;

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

// Rota padrão redireciona para login
Route::get('/', function () {
    return redirect('/login');
});

// Rotas de Autenticação
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Grupo de rotas protegidas pelo middleware de autenticação
Route::middleware(['auth'])->group(function () {
    // Rota para a página inicial após login
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Rotas para CRUD de Funcionários
    Route::resource('funcionarios', FuncionarioController::class);

    // Rotas para CRUD de Departamentos
    Route::resource('departamentos', DepartamentoController::class);

    // Rotas para CRUD de Salas
    Route::resource('salas', SalaController::class);

    // Rotas para CRUD de Chaves
    Route::resource('chaves', ChaveController::class);
});

// Rotas de autenticação geradas pelo Laravel
Auth::routes();

// Rota adicional para home, caso não autenticado
Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
