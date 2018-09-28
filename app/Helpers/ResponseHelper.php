<?php

namespace App\Helpers;


trait ResponseHelper
{
    public function succes(array $data = [],string $message = "ok",int $code = self::SUCCESS_CODE)
    {
        return response([
            'data'=>$data,
            'message'=>$message,
            'code'=>$code,
        ]);
    }
    public function error(array $data = [],string $message = "ok",int $code = self::ERROR_CODE)
    {
        return response([
            'message'=>$message,
            'code'=>$code,
        ]);
    }
}