<?php

use App\Models\User\User;


/**
 * @return User
 */
function user()
{
    return app('auth')->user();
}

function timezone()
{
    if (Auth::check()) {
        return user()->timezone;
    }

    return config('app.timezone');
}
