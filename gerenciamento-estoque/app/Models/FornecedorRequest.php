<?php

namespace App\Models;

use OpenApi\Annotations as OA;

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
class FornecedorRequest
{
    // This class is used only for Swagger documentation purposes.
}
