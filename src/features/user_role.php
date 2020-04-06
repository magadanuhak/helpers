<?php

use App\Models\Role\Role;

/**
 * @return Role
 */
function user_role()
{
    return \user()->roles()->first();
}