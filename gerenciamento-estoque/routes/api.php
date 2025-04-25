<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MovimentacaoController;

Route::apiResource('produtos', ProdutoController::class);
Route::apiResource('fornecedores', FornecedorController::class);
Route::apiResource('categorias', CategoriaController::class);
Route::apiResource('movimentacoes', MovimentacaoController::class);
