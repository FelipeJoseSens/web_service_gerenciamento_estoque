<?php

namespace App\Http\Controllers;

use OpenApi\Annotations as OA;
use Illuminate\Routing\Controller as BaseController;

/**
 * ------------------------------------------
 *           ANOTAÇÕES GLOBAIS SWAGGER
 * ------------------------------------------
 *
 * @OA\Info(
 *     title="API Gerenciamento de Estoque",
 *     version="1.0.0",
 *     description="API para controle de produtos, categorias, fornecedores e movimentações",
 *     @OA\Contact(email="suporte@empresa.com")
 * )
 *
 * @OA\Server(
 *     url="http://localhost:8000/api",
 *     description="Servidor Local"
 * )
 *
 * @OA\Tag(name="Categorias", description="Operações com categorias")
 * @OA\Tag(name="Fornecedores", description="Operações com fornecedores")
 * @OA\Tag(name="Produtos", description="Operações com produtos")
 * @OA\Tag(name="Movimentações", description="Operações com movimentações")
 *
 * ------------------------------------------
 *             SCHEMAS (MODELOS)
 * ------------------------------------------
 *
 * @OA\Schema(
 *     schema="Categoria",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="nome", type="string", example="Eletrônicos"),
 *     @OA\Property(property="descricao", type="string", nullable=true, example="Descrição da categoria")
 * )
 */

class Controller extends BaseController
{
    // Esta classe não precisa de métodos, apenas das anotações Swagger!
}
