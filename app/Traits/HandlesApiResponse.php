<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait HandlesApiResponse
{
    // Handle success responses
    protected function successResponse($data, $status = Response::HTTP_OK)
    {
        return response()->json(['data' => $data], $status);
    }

    // Handle error responses
    protected function errorResponse($message, $status = Response::HTTP_BAD_REQUEST)
    {
        return response()->json(['error' => $message], $status);
    }

    // Handle not found response
    protected function notFoundResponse()
    {
        return $this->errorResponse('Resource not found', Response::HTTP_NOT_FOUND);
    }
}
