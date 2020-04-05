<?php

use Illuminate\Database\Eloquent\Builder;

/**
 * @param Builder $builder
 *
 * @return string
 */
function dump_sql(Builder $builder)
{
    $sql = $builder->toSql();
    $bindings = $builder->getBindings();

    array_walk($bindings, static function ($value) use (&$sql) {
        $value = is_string($value) ? var_export($value, true) : $value;
        $sql = preg_replace("/\?/", $value, $sql, 1);
    });

    return $sql;
}
