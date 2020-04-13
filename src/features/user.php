<?php

use App\Models\User\User;


/**
 * @return User
 */
function user()
{
    return app('auth')->user();
}

function userTimezone()
{
    if (app('auth')->check()) {
        return user()->timezone;
    }

    return config('app.timezone');
}
