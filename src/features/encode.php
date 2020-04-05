<?php

/**
 * @param          $value
 * @param int|null $options
 * @param int      $depth
 *
 * @return mixed
 */
function encode(
    $value,
    int $depth = 512,
    int $options = null
): ?string {
    return json_encode(
        $value,
        JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR | $options,
        $depth);
}