<?php

use App\Role;

/**
 * @return Role
 */
function user_role()
{
    return \user()->roles()->first();
}