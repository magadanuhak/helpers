<?php

use App\User;


/**
 * @return User
 */
function user()
{
    return app('auth')->user();
}