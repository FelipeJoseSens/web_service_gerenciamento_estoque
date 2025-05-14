<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
class Produto extends Model
{
    public function fornecedor() {
        return $this->belongsTo(Fornecedor::class);
    }

    public function categoria() {
        return $this->belongsTo(Categoria::class);
    }

    public function movimentacao() {
        return $this->hasMany(Movimentacao::class);
    }
}
