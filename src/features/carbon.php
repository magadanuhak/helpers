<?php

use Carbon\Carbon;

/**
 * @param mixed ...$args
 *
 * @return Carbon
 */
function carbon(...$args)
{
    return Carbon::parse(...$args);
}