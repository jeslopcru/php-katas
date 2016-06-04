<?php

function toRna($dna)
{
    $rna = '';
    $dnaToRna = ['G' => 'C', 'C' => 'G', 'T' => 'A', 'A' => 'U'];

    for ($i = 0; $i < strlen($dna); $i++) {
        $rna .= $dnaToRna[$dna[$i]];
    }

    return $rna;
}
