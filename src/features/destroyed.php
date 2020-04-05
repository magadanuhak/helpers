<?php

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * @param array $data
 *
 * @return JsonResponse
 */
function destroyed(array $data = [])
{
    return response()->json($data, Response::HTTP_NO_CONTENT);
}