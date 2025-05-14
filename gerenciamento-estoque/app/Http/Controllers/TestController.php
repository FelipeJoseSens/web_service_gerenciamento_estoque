<?php

namespace App\Http\Controllers;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="TestSchema",
 *     type="object",
 *     required={"field"},
 *     @OA\Property(
 *         property="field",
 *         type="string",
 *         description="A test field"
 *     )
 * )
 */
class TestController extends Controller
{
    /**
     * @OA\Get(
     *     path="/test",
     *     tags={"Test"},
     *     summary="Test endpoint",
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(ref="#/components/schemas/TestSchema")
     *     )
     * )
     */
    public function index()
    {
        return response()->json(["field" => "value"]);
    }
}
