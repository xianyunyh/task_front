<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    const SUCCESS_CODE = 20000;
    const ERROR_CODE = 30000;
    use ResponseHelper;
}