<?php

namespace App\Schemas;

use OpenApi\Annotations as OA;

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
class Fornecedor
{
    // This class is used only for Swagger documentation purposes.
}
