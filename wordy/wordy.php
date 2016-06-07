<?php

function calculate($expr)
{
    // No numbers
    if (strlen(preg_replace('#[^\d]+#', '', $expr)) <= 0) {
        throw new \InvalidArgumentException;
    }

    // Operation not allowed
    if (strpos($expr, 'cubed') != false) {
        throw new \InvalidArgumentException;
    }

    $subs = [
        'plus' => '+',
        'minus' => '-',
        'times' => '*',
        'multiplied by' => '*',
        'divided by' => '/',
        '?' => '',
        'What is ' => '',
    ];

    $expr = str_replace(array_keys($subs), array_values($subs), $expr);

    // The hacky part ...
    $exprArray = explode(' ', $expr);
    if (sizeof($exprArray) > 3) {
        array_unshift($exprArray, '(');
        array_splice($exprArray, 4, 0, [')']);
    }
    $expr = implode(' ', $exprArray);
    // End hacky part

    return eval("return ($expr);");
}
