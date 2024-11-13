<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController; // Importando o controller principal
use App\Http\Controllers\SobreNosController; // Importando o controller do sobre nós
use App\Http\Controllers\ContatoController; // Importando o controller do contato
use App\Http\Controllers\TesteController; // Importando o controller teste
use App\Http\Controllers\FornecedorController; // Importando o controller fornecedor

Route::get("/", [PrincipalController::class, 'principal'])->name('site.index'); // Rota principal

Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos'])->name('site.sobrenos'); // Rota sobre nós

Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato'); // Rota Contato

Route::post('/contato', [ContatoController::class, 'contato'])->name('site.contato'); // Rota contato com o verbo HTTP POST

Route::get('/login', function () {
  return "login";
})->name('site.login'); // Rota Login


// Rotas agrupadas em /app

Route::prefix('/app')->group(function () {
  Route::get('/clientes', function () {
    return "clientes";
  })->name('app.clientes'); // Rota clientes

  Route::get('/fornecedores', [FornecedorController::class, 'index'])->name('app.fornecedores'); // Rota fornecedores

  Route::get('/produtos', function () {
    return "produtos";
  }); // Rota produtos
})->name('app.produtos');

Route::get('/teste/{p1}/{p2}', [TesteController::class, 'teste'])->name('teste');

Route::fallback(function () {
  echo 'A rota acessada não existe. <a href="' . route('site.index') . '">Clique aqui</a> para voltar à página inicial.';
});
