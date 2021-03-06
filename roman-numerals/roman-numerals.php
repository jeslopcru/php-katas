<?php

function toRoman($number)
{
	if ($number > 3000) {
		return null;
	}

	$numbers = [
		1000 => 'M',
		900  => 'CM',
		500  => 'D',
		400  => 'CD',
		100  => 'C',
		90   => 'XC',
		50   => 'L',
		40   => 'XL',
		10   => 'X',
		9    => 'IX',
		5    => 'V',
		4    => 'IV',
		1    => 'I',
	];

	if (in_array($number, array_keys($numbers))) {
		return $numbers[$number];
	}

	$result = '';

	foreach ($numbers as $arabic => $roman) {
		while ($number >= $arabic) {
			$result .= $roman;
			$number -= $arabic;
		}
	}

	return $result;
}
