<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
/**
 * @OA\Info(
 *      title = "CreditTech API documentation",
 *      version = "1.0.0",
 *      @OA\Contact(
 *          email = "myself.ronin@hotmail.com"
 *      ),
 *      @OA\License(
 *          name="Apache 2.0"
 *      )
 * )
 * @OA\Server(
 *      description="Laravel Swagger API server",
 *      url="http://127.0.0.1:8000/api"
 * )
 *
 */

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
