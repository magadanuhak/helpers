<?php


/**
 * Formats array
 *
 * @param array $array [key => 'value', key2 => 'value']
 * @return array [['value' => key, 'text' => value]]
 */
function text_value(array $array): array {
    foreach ($array as $text => &$value) {
        $value = ['value' => (bool)$text, 'text' =>  $value];
    }
    unset($value);

    return $array;
}