<?php

class PigLatin
{
    public static function translate($phrase)
    {
        $words = explode(' ', $phrase);
        $translation = array_map([self::class, 'toPig'], $words);

        return implode(' ', $translation);
    }

    public static function toPig($word)
    {
        $wordArray = str_split(strtolower($word));
        $first = $wordArray[0];
        $second = $wordArray[1];
        $third = $wordArray[2];
        $sliceIndex = 1;

        if (!self::isVowel($second) and $second == 'q' and $third == 'u') {
            $first = 'squ';
            $sliceIndex = 3;
        }

        if ($first == 't' and $second == 'h' and $third == 'r') {
            $first = 'thr';
            $sliceIndex = 3;
        }

        if ($first == 's' and $second == 'c' and $third == 'h') {
            $first = 'sch';
            $sliceIndex = 3;
        }

        if ($first == 'c' and $second == 'h') {
            $first = 'ch';
            $sliceIndex = 2;
        }

        if ($first == 'q' and $second == 'u') {
            $first = 'qu';
            $sliceIndex = 2;
        }

        if ($first == 'x' and $second == 'r') {
            return $word . "ay";
        }

        if ($first == 't' and $second == 'h') {
            $first = 'th';
            $sliceIndex = 2;
        }

        if (self::isVowel($first)) {
            return $word . "ay";
        }

        if ($first == 'y' and !self::isVowel($second)) {
            return $word . "ay";
        }

        return implode('', array_slice($wordArray, $sliceIndex)) . $first . "ay";
    }

    public static function isVowel($letter)
    {
        return in_array($letter, ['a', 'e', 'i', 'o', 'u']);
    }
}
