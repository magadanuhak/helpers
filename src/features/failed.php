<?php

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * @param mixed $data
 *
 * @return JsonResponse
 */
function failed($data = null)
{
    return response()->json($data, Response::HTTP_INTERNAL_SERVER_ERROR);
}