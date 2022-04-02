<?php

namespace App\Http\Traits;
use Illuminate\Http\Response;

trait ResponseTrait {

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function success($message = null, $data = [], $statusCode = Response::HTTP_OK)
    {
        $response = [
            'success' => true,
            'message' => $message,
            'data'    => $data
        ];

        return response()->json($response, $statusCode);
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function error($message = null, $errors = [], $statusCode = Response::HTTP_FORBIDDEN)
    {
        $response = [
            'success' => false,
            'message' => $message,
            'data'    => $errors
        ];

        return response()->json($response, $statusCode);
    }
}
