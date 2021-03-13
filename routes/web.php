<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProdutoController;

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

Route::get('/', function () {
    return view('welcome');
});

//https://laravel.com/docs/8.x/controllers#actions-handled-by-resource-controller

/*
O que foi alterado
routes\web.php
resources\views
app\Models\Produto.php
app\Http\Controllers\ProdutoController.php
*/

/*
comandos úteis artisan
    php artisan cache:clear
    php artisan route:clear
    php artisan config:clear
    php artisan view:clear
*/

// lista produtos
Route::get('/produto', [ProdutoController::class, 'index'])->name('produto.index');


// create - exibe formulário
Route::get('/produto/create', [ProdutoController::class, 'create'])->name('produto.create');

// create - salva formulário no banco
Route::post('/produto/create', [ProdutoController::class, 'store'])->name('produto.store');


// exibe produto
Route::get('/produto/{id}', [ProdutoController::class, 'show'])->name('produto.show');


// edit - exibe formulário com o produto
Route::get('/produto/{id}/edit', [ProdutoController::class, 'edit'])->name('produto.edit');

// edit - salva formulário no banco
Route::put('/produto/{id}', [ProdutoController::class, 'update'])->name('produto.update');

// destroy - deleta um produto
Route::delete('/produto/{id}', [ProdutoController::class, 'destroy'])->name('produto.destroy');
