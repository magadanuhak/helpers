<?php

/**
 * @param string $json
 * @param bool   $assoc
 * @param int    $depth
 * @param int    $options
 *
 * @return mixed
 */
function decode(
    string $json,
    bool $assoc = true,
    int $depth = 512,
    int $options = null
) {
    return json_decode(
        $json,
        $assoc,
        $depth,
        JSON_THROW_ON_ERROR | $options
    );
}