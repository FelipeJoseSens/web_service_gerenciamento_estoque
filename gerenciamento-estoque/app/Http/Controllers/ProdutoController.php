<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
/**
 * @OA\Get(
 *     path="/produtos",
 *     tags={"Produtos"},
 *     summary="Listar todos os produtos",
 *     @OA\Response(
 *         response=200,
 *         description="Lista de produtos",
 *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Produto"))
 *     )
 * )
 */
public function index() {
    return Produto::with(['fornecedor', 'categoria'])->get();
}

/**
 * @OA\Schema(
 *     schema="ProdutoRequest",
 *     required={"nome", "preco", "estoque", "fornecedor_id", "categoria_id"},
 *     @OA\Property(property="nome", type="string"),
 *     @OA\Property(property="descricao", type="string", nullable=true),
 *     @OA\Property(property="preco", type="number"),
 *     @OA\Property(property="estoque", type="integer"),
 *     @OA\Property(property="fornecedor_id", type="integer"),
 *     @OA\Property(property="categoria_id", type="integer")
 * )
 */

// Define the Produto schema
/**
 * @OA\Schema(
 *     schema="Produto",
 *     type="object",
 *     required={"id", "nome", "preco", "estoque", "fornecedor_id", "categoria_id"},
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         description="ID do produto"
 *     ),
 *     @OA\Property(
 *         property="nome",
 *         type="string",
 *         description="Nome do produto"
 *     ),
 *     @OA\Property(
 *         property="preco",
 *         type="number",
 *         format="float",
 *         description="Preço do produto"
 *     ),
 *     @OA\Property(
 *         property="estoque",
 *         type="integer",
 *         description="Quantidade em estoque"
 *     ),
 *     @OA\Property(
 *         property="fornecedor_id",
 *         type="integer",
 *         description="ID do fornecedor"
 *     ),
 *     @OA\Property(
 *         property="categoria_id",
 *         type="integer",
 *         description="ID da categoria"
 *     )
 * )
 */

    public function store(Request $request) {
        return Produto::create($request->validate([
            'nome' => 'required',
            'descricao' => 'nullable',
            'preco' => 'required|numeric',
            'estoque' => 'required|integer',
            'fornecedor_id' => 'required|exists:fornecedores,id',
            'categoria_id' => 'required|exists:categorias,id'
        ]));

    }

    public function show(string $id)
    {
        return Produto::with(['fornecedor', 'categoria'])->findOrFail($id);
    }

    public function update(Request $request, string $id)
    {
        $produto = Produto::findOrFail($id);

        $produto->update($request->validate([
            'nome' => 'required',
            'descricao' => 'nullable',
            'preco' => 'required|numeric',
            'estoque' => 'required|integer',
            'fornecedor_id' => 'required|exists:fornecedores,id',
            'categoria_id' => 'required|exists:categorias,id'
        ]));

        return $produto;
    }

    public function destroy(string $id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();

        return response()->json(['message' => 'Produto deletado com sucesso.']);
    }
}
