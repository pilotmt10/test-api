<?php

namespace App\Base\Responses;

class SuccessResponse
{
    public static function make(): array
    {
        return [
            'result' => 'success'
        ];
    }
}
