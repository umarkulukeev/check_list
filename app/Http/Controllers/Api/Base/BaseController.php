<?php

namespace App\Http\Controllers\Api\Base;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\V1\Base\ApiResponse;


class BaseController extends Controller
{
    protected $response;

    public function __construct(ApiResponse $apiResponse)
    {
        $this->response = $apiResponse;
    }
}
