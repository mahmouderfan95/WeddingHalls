<?php
namespace App\Traits\API;

trait Helper
{
    public function MakeResponse($data,$message,$status,$statusCode){
        return response()->json([
            'data' => $data,
            'message' => $message,
            'status' => $status
        ],$statusCode);
    }

    public function MakeResponseAuth($data,$message,$status,$statusCode,$token){
        return response()->json([
            'data' => $data,
            'token' => $token,
            'message' => $message,
            'status' => $status
        ],$statusCode);
    }
}
