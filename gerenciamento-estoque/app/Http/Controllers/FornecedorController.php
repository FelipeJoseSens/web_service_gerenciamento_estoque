<?php

namespace App\Http\Controllers;

use OpenApi\Annotations as OA;
use App\Models\Fornecedor;
use Illuminate\Http\Request;

/**
 * @OA\Schema(
 *     schema="Fornecedor",
 *     type="object",
 *     required={"id", "nome"},
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="ID do fornecedor"
 *     ),
 *     @OA\Property(
 *         property="nome",
 *         type="string",
 *         description="Nome do fornecedor"
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
 */

/**
 * @OA\Schema(
 *     schema="FornecedorRequest",
 *     type="object",
 *     required={"nome"},
 *     @OA\Property(
 *         property="nome",
 *         type="string",
 *         description="Nome do fornecedor"
 *     )
 * )
 */

class FornecedorController extends Controller
{
    /**
     * @OA\Get(
     *     path="/fornecedores",
     *     tags={"Fornecedores"},
     *     summary="Listar todos os fornecedores",
     *     @OA\Response(
     *         response=200,
     *         description="Lista de fornecedores",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Fornecedor")
     *         )
     *     )
     * )
     */
    public function index() {
        return Fornecedor::all();
    }

    /**
     * @OA\Post(
     *     path="/fornecedores",
     *     tags={"Fornecedores"},
     *     summary="Criar um novo fornecedor",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/FornecedorRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Fornecedor criado com sucesso"
     *     )
     * )
     */
    public function store(Request $request) {
        // ... código existente
    }

    /**
     * @OA\Post(
     *     path="/fornecedores/test",
     *     tags={"Fornecedores"},
     *     summary="Test FornecedorRequest",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             required={"nome"},
     *             @OA\Property(
     *                 property="nome",
     *                 type="string",
     *                 description="Nome do fornecedor"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success"
     *     )
     * )
     */
    public function test(Request $request)
    {
        return response()->json(["message" => "Test successful"]);
    }

    /**
     * @OA\Post(
     *     path="/fornecedores/test-inline",
     *     tags={"Fornecedores"},
     *     summary="Test inline schema",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             required={"nome"},
     *             @OA\Property(
     *                 property="nome",
     *                 type="string",
     *                 description="Nome do fornecedor"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success"
     *     )
     * )
     */
    public function testInline(Request $request)
    {
        return response()->json(["message" => "Inline test successful"]);
    }

    /**
     * @OA\Post(
     *     path="/fornecedores/test-qualified",
     *     tags={"Fornecedores"},
     *     summary="Test fully qualified reference",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="App\\Schemas\\FornecedorRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success"
     *     )
     * )
     */
    public function testQualified(Request $request)
    {
        return response()->json(["message" => "Qualified reference test successful"]);
    }

    /**
     * @OA\Post(
     *     path="/fornecedores/inline",
     *     tags={"Fornecedores"},
     *     summary="Test inline FornecedorRequest schema",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             required={"nome"},
     *             @OA\Property(
     *                 property="nome",
     *                 type="string",
     *                 description="Nome do fornecedor"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Fornecedor criado com sucesso"
     *     )
     * )
     */
}
