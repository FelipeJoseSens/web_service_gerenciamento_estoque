<?php

namespace App\Http\Controllers;

use OpenApi\Annotations as OA;
use App\Models\Movimentacao;
use App\Models\Produto; // Certifique-se de importar o modelo Produto
use Illuminate\Http\Request;

class MovimentacaoController extends Controller
{
    /**
     * @OA\Get(
     *     path="/movimentacoes",
     *     tags={"Movimentações"},
     *     summary="Listar todas as movimentações",
     *     @OA\Response(
     *         response=200,
     *         description="Lista de movimentações",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Movimentacao"))
     *     )
     * )
     */
    public function index() {
        return Movimentacao::all();
    }

    /**
     * @OA\Post(
     *     path="/movimentacoes",
     *     tags={"Movimentações"},
     *     summary="Registrar nova movimentação",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/MovimentacaoRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Movimentação registrada"
     *     )
     * )
     */
    public function store(Request $request) {
        // ... código existente
    }

    /**
     * @OA\Get(
     *     path="/movimentacoes/inline",
     *     tags={"Movimentações"},
     *     summary="Test inline Movimentacao schema",
     *     @OA\Response(
     *         response=200,
     *         description="Lista de movimentações",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 type="object",
     *                 required={"id", "produto_id", "quantidade", "tipo"},
     *                 @OA\Property(property="id", type="integer", description="ID da movimentação"),
     *                 @OA\Property(property="produto_id", type="integer", description="ID do produto relacionado"),
     *                 @OA\Property(property="quantidade", type="integer", description="Quantidade movimentada"),
     *                 @OA\Property(property="tipo", type="string", description="Tipo de movimentação (entrada ou saída)")
     *             )
     *         )
     *     )
     * )
     */
    public function testInlineMovimentacao()
    {
        return response()->json([]);
    }

    /**
     * @OA\Post(
     *     path="/movimentacoes/inline-request",
     *     tags={"Movimentações"},
     *     summary="Test inline MovimentacaoRequest schema",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             required={"produto_id", "quantidade", "tipo"},
     *             @OA\Property(property="produto_id", type="integer", description="ID do produto relacionado"),
     *             @OA\Property(property="quantidade", type="integer", description="Quantidade movimentada"),
     *             @OA\Property(property="tipo", type="string", description="Tipo de movimentação (entrada ou saída)")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Movimentação registrada"
     *     )
     * )
     */
    public function testInlineMovimentacaoRequest()
    {
        return response()->json([]);
    }

    // Adicione anotações para show(), update() e destroy()
}

// Schemas para Movimentação:
/**
 * @OA\Schema(
 *     schema="Movimentacao",
 *     type="object",
 *     required={"id", "produto_id", "quantidade", "tipo"},
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="ID da movimentação"
 *     ),
 *     @OA\Property(
 *         property="produto_id",
 *         type="integer",
 *         description="ID do produto relacionado"
 *     ),
 *     @OA\Property(
 *         property="quantidade",
 *         type="integer",
 *         description="Quantidade movimentada"
 *     ),
 *     @OA\Property(
 *         property="tipo",
 *         type="string",
 *         description="Tipo de movimentação (entrada ou saída)"
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         type="string",
 *         format="date-time",
 *         description="Data de criação"
 *     ),
 *     @OA\Property(
 *         property="updated_at",
 *         type="string",
 *         format="date-time",
 *         description="Data de atualização"
 *     )
 * )
 *
 * @OA\Schema(
 *     schema="MovimentacaoRequest",
 *     type="object",
 *     required={"produto_id", "quantidade"},
 *     @OA\Property(
 *         property="produto_id",
 *         type="integer",
 *         description="ID do produto"
 *     ),
 *     @OA\Property(
 *         property="quantidade",
 *         type="integer",
 *         description="Quantidade movimentada"
 *     )
 * )
 */
