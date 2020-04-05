<?php

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * @param mixed $data
 *
 * @return JsonResponse
 */
function created($data = null)
{
    return response()->json($data, Response::HTTP_CREATED);
}