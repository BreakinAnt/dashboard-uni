<?php

namespace App\Helpers;

class JsonMsg 
{
    static function create($data, $error = false, $code = 200){
        $jsonMsg = [
            'error' => $error,
            'data' => $data
        ];
    
        return response()->json($jsonMsg, $code);
    }
}