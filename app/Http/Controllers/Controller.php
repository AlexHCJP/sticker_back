<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class Controller extends BaseController
{
    protected function response(\Closure $method): JsonResponse
    {
        try {
            return response()->json($method());
        } catch (\Throwable $throwable) {
            $errorCode = (int)$throwable->getCode();
            if ($errorCode >= 400 && $errorCode <= 500) {
                return response()->json(
                    ['message' => $throwable->getMessage()],
                    $errorCode
                );
            } else {
                // Log::error('Error: ' . $throwable->getMessage());

                return response()->json(
                    ['message' => __('messages.serverError'), 'n' => $throwable->getMessage()],
                    Response::HTTP_INTERNAL_SERVER_ERROR
                );
            }
        }
    }
}
