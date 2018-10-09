<?php

namespace App\Helpers;

trait ResponseHelper
{
    public function success($data = [], string $message = 'ok', int $code = self::SUCCESS_CODE)
    {
        if (!is_array($data)) {
            $data = collect($data)->toArray();
        }

        return response([
            'data'   => $data,
            'message'=> $message,
            'code'   => $code,
        ]);
    }

    public function error(string $message = 'ok', int $code = self::ERROR_CODE)
    {
        return response([
            'message'=> $message,
            'code'   => $code,
        ]);
    }
}
