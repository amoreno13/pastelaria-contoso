<?php

namespace App\Traits;

trait HttpResponse
{
    public function showResponse($data, $code = 200){

        return response()
                ->json($data)
                ->setStatusCode($code);
    }
}