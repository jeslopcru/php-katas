<?php

function distance($a, $b)
{
    $difference = 0;

    if (strlen($a) !== strlen($b)) {
        throw new InvalidArgumentException("DNA strands must be of equal length.");
    }

    $iterations = strlen($a);

    for ($i = 0; $i < $iterations; $i++) {
        if ($a[$i] !== $b[$i]) {
            $difference++;
        }
    }

    return $difference;
}
