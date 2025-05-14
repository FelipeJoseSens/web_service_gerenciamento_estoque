<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MovimentacaoController;
use Illuminate\Support\Facades\Log;

/**
 * @OA\Info(
 *     title="API de Gerenciamento de Estoque",
 *     version="1.0.0",
 *     description="Documentação da API para o sistema de gerenciamento de estoque."
 * )
 *
 * @OA\Server(
 *     url="http://localhost/api",
 *     description="Servidor local"
 * )
 */

/**
 * @OA\PathItem(
 *     path="/api"
 * )
 */
Route::prefix('api')->group(function () {
    /**
     * @OA\Get(
     *     path="/api/produtos",
     *     summary="Listar todos os produtos",
     *     @OA\Response(
     *         response=200,
     *         description="Lista de produtos retornada com sucesso"
     *     )
     * )
     */
    Route::apiResource('produtos', ProdutoController::class);

    /**
     * @OA\Get(
     *     path="/api/fornecedores",
     *     summary="Listar todos os fornecedores",
     *     @OA\Response(
     *         response=200,
     *         description="Lista de fornecedores retornada com sucesso"
     *     )
     * )
     */
    Route::apiResource('fornecedores', FornecedorController::class);

    /**
     * @OA\Get(
     *     path="/api/categorias",
     *     summary="Listar todas as categorias",
     *     @OA\Response(
     *         response=200,
     *         description="Lista de categorias retornada com sucesso"
     *     )
     * )
     */
    Route::apiResource('categorias', CategoriaController::class);

    /**
     * @OA\Get(
     *     path="/api/movimentacoes",
     *     summary="Listar todas as movimentações",
     *     @OA\Response(
     *         response=200,
     *         description="Lista de movimentações retornada com sucesso"
     *     )
     * )
     */
    Route::apiResource('movimentacoes', MovimentacaoController::class);
});

Log::info('api.php file loaded');
