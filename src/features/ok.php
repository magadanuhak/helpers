<?php

use Illuminate\Http\JsonResponse;

/**
 * @param mixed $data
 *
 * @return JsonResponse
 */
function ok($data = null)
{
    return response()->json($data);
}