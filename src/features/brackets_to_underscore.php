<?php

/**
 * Formats string from brackets to underscore
 *
 * @param string $value - example[first][second]
 *
 * @return string - example_first_second
 */
function brackets_to_underscore(string $value): string
{
    return str_replace(['[', ']',], ['_', ''], $value);
}