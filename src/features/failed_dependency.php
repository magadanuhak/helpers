<?php

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * The request failed because it depended on another request and that request failed
 *
 * @param mixed $data
 * @param array $headers
 * @return void
 */
function failed_dependency($data = '', $headers = [])
{
    return abort(Response::HTTP_FAILED_DEPENDENCY, $data, $headers);
}