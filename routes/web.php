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
   // Route::resource('funcionarios', FuncionarioController::class);
    Route::get('/funcionarios', [FuncionarioController::class, 'index'])->name('funcionarios.index');
    Route::get('/funcionarios/create', [FuncionarioController::class, 'create'])->name('funcionarios.create');
    Route::get('/funcionarios/{funcionario}', [FuncionarioController::class, 'show'])->name('funcionarios.show');
    Route::post('/funcionarios', [FuncionarioController::class, 'store'])->name('funcionarios.store');
    Route::get('/funcionarios/{funcionario}/edit', [FuncionarioController::class, 'edit'])->name('funcionarios.edit');
    Route::put('/funcionarios/{funcionario}/update', [FuncionarioController::class, 'update'])->name('funcionarios.update');
    Route::delete('/funcionarios/{funcionario}/destroy', [FuncionarioController::class, 'destroy'])->name('funcionarios.destroy');
   
    // Rotas para CRUD de Departamentos
    // Route::resource('departamentos', DepartamentoController::class);
    Route::get('/departamentos', [DepartamentoController::class, 'index'])->name('departamentos.index');
    Route::get('/departamentos/create', [DepartamentoController::class, 'create'])->name('departamentos.create');
    Route::get('/departamentos/{departamento}', [DepartamentoController::class, 'show'])->name('departamentos.show');
    Route::post('/departamentos', [DepartamentoController::class, 'store'])->name('departamentos.store');
    Route::get('/departamentos/{departamento}/edit', [DepartamentoController::class, 'edit'])->name('departamentos.edit');
    Route::put('/departamentos/{departamento}/update', [DepartamentoController::class, 'update'])->name('departamentos.update');
    Route::delete('/departamentos/{departamento}/destroy', [DepartamentoController::class, 'destroy'])->name('departamentos.destroy');

    // Rotas para CRUD de Salas
   // Route::resource('salas', SalaController::class);
    Route::get('/salas', [SalaController::class, 'index'])->name('salas.index');
    Route::get('/salas/create', [SalaController::class, 'create'])->name('salas.create');
    Route::get('/salas/{sala}', [SalaController::class, 'show'])->name('salas.show');
    Route::post('/salas', [SalaController::class, 'store'])->name('salas.store');
    Route::get('/salas/{sala}/edit', [SalaController::class, 'edit'])->name('salas.edit');
    Route::put('/salas/{sala}/update', [SalaController::class, 'update'])->name('salas.update');
    Route::delete('/salas/{sala}/destroy', [SalaController::class, 'destroy'])->name('salas.destroy');
    
    // Rotas para CRUD de Chaves 
    //Route::resource('chaves', ChaveController::class);
    Route::get('/chaves', [ChaveController::class, 'index'])->name('chaves.index');
    Route::get('/chaves/create', [ChaveController::class, 'create'])->name('chaves.create');
    Route::get('/chaves/{chave}', [ChaveController::class, 'show'])->name('chaves.show');
    Route::post('/chaves', [ChaveController::class, 'store'])->name('chaves.store');
    Route::get('/chaves/{chave}/edit', [ChaveController::class, 'edit'])->name('chaves.edit');
    Route::put('/chaves/{chave}/update', [ChaveController::class, 'update'])->name('chaves.update');
    Route::delete('/chaves/{chave}/destroy', [ChaveController::class, 'destroy'])->name('chaves.destroy');
    
});

// Rotas de autenticação geradas pelo Laravel
Auth::routes();

// Rota adicional para home, caso não autenticado
Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
