<?php

use Faker\Factory;

/**
 * @param null $property
 *
 * @return \Faker\Generator|mixed
 */
function faker($property = null)
{
    $faker = Factory::create();

    return $property ? $faker->{$property} : $faker;
}
