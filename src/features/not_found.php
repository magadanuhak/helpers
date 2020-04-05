<?php

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * @param mixed $data
 *
 * @return JsonResponse
 */
function not_found($data = null)
{
    return response()->json($data, Response::HTTP_NOT_FOUND);
}