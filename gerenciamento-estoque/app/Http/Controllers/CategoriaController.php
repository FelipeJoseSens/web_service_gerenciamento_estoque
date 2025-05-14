<?php

namespace App\Http\Controllers;

use OpenApi\Annotations as OA;
use App\Models\Categoria;
use Illuminate\Http\Request;

/**
 * @OA\Schema(
 *     schema="CategoriaRequest",
 *     type="object",
 *     required={"nome"},
 *     @OA\Property(
 *         property="nome",
 *         type="string",
 *         description="Nome da categoria"
 *     )
 * )
 */

class CategoriaController extends Controller // Herda do Controller base!
{
    /**
     * @OA\Get(
     *     path="/categorias",
     *     tags={"Categorias"},
     *     summary="Listar todas as categorias",
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Categoria")
     *         )
     *     )
     * )
     */
    public function index()
    {
        return Categoria::all();
    }

    /**
     * @OA\Post(
     *     path="/categorias",
     *     tags={"Categorias"},
     *     summary="Criar nova categoria",
     *     operationId="createCategoria",
     *     @OA\RequestBody(
     *         required=true,
     *         description="Dados da categoria",
     *         @OA\JsonContent(ref="#/components/schemas/CategoriaRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Categoria criada com sucesso",
     *         @OA\JsonContent(ref="#/components/schemas/Categoria")
     *     )
     * )
     */
    public function store(Request $request) {
        return Categoria::create($request->validate([
            'nome' => 'required|string',
            'descricao' => 'nullable|string'
        ]));
    }

    /**
     * @OA\Get(
     *     path="/categorias/{id}",
     *     tags={"Categorias"},
     *     summary="Exibir categoria específica",
     *     operationId="getCategoriaById",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID da categoria",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Categoria encontrada",
     *         @OA\JsonContent(ref="#/components/schemas/Categoria")
     *     ),
     *     @OA\Response(response=404, description="Categoria não encontrada")
     * )
     */
    public function show(string $id) {
        return Categoria::findOrFail($id);
    }

    /**
     * @OA\Put(
     *     path="/categorias/{id}",
     *     tags={"Categorias"},
     *     summary="Atualizar categoria",
     *     operationId="updateCategoria",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID da categoria",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         description="Dados atualizados da categoria",
     *         @OA\JsonContent(ref="#/components/schemas/CategoriaRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Categoria atualizada",
     *         @OA\JsonContent(ref="#/components/schemas/Categoria")
     *     ),
     *     @OA\Response(response=404, description="Categoria não encontrada")
     * )
     */
    public function update(Request $request, string $id) {
        $categoria = Categoria::findOrFail($id);
        $categoria->update($request->validate([
            'nome' => 'required|string',
            'descricao' => 'nullable|string'
        ]));
        return $categoria;
    }

    /**
     * @OA\Delete(
     *     path="/categorias/{id}",
     *     tags={"Categorias"},
     *     summary="Excluir categoria",
     *     operationId="deleteCategoria",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID da categoria",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Categoria excluída com sucesso",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Categoria deletada com sucesso.")
     *         )
     *     ),
     *     @OA\Response(response=404, description="Categoria não encontrada")
     * )
     */
    public function destroy(string $id) {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        return response()->json(['message' => 'Categoria deletada com sucesso.']);
    }
}
