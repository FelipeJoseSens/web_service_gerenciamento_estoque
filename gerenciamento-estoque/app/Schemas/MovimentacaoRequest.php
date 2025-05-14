<?php

namespace App\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="MovimentacaoRequest",
 *     type="object",
 *     required={"produto_id", "quantidade", "tipo"},
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
 *     )
 * )
 */
class MovimentacaoRequest
{
    // This class is used only for Swagger documentation purposes.
}
