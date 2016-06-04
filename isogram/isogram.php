<?php

function isIsogram($word)
{
	$seen = [];
	$wordArray = preg_split('//u', strtolower(str_replace(['-', ' '], '', $word)), -1, PREG_SPLIT_NO_EMPTY);
	foreach ($wordArray as $letter) {
		if (!in_array($letter, $seen)) {
			$seen[] = $letter;
		} else {
			return false;
		}
	}

	return true;
}
