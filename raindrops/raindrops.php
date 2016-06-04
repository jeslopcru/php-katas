<?php

function raindrops($num)
{
    $raindrops = [3 => 'Pling', 5 => 'Plang', 7 => 'Plong'];
    $response = '';

    foreach ($raindrops as $factor => $raindrop) {
        if ($num % $factor == 0) {
            $response .= $raindrop;
        }
    }

    return $response ?: (string) $num;
}
