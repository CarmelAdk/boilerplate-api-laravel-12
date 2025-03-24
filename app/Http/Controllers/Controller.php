<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *     version="v1",
 *     title="Boilerplate API Documentation",
 *     description="Documentation de l'API Boilerplate",
 *     @OA\Contact(
 *         email="contact@boilerplate.com"
 *     )
 * )
 * @OA\Server(
 *     url=L5_SWAGGER_CONST_HOST,
 *     description="Serveur API"
 * )
 * @OA\SecurityScheme(
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 *     securityScheme="bearerAuth"
 * )
 * @OA\Tag(
 *     name="Boilerplate",
 *     description="API pour Boilerplate"
 * )
 * @OA\PathItem(
 *     path="/v1"
 * )
 */

abstract class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
