<?php

namespace App\Schemas;

use OpenApi\Annotations as OA;

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
 */
class Movimentacao
{
    // This class is used only for Swagger documentation purposes.
}
