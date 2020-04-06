<?php

use App\Models\User\User;


/**
 * @return User
 */
function user()
{
    return app('auth')->user();
}