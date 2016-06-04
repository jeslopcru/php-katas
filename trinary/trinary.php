<?php

function toDecimal($trinary)
{
	$result = 0;
	$digits = str_split($trinary);
	$reversed = array_reverse($digits);

	foreach ($reversed as $position => $trinary) {
		if (is_nan($trinary) or $trinary > 2 or $trinary < 0) {
			return 0;
		}

		$orderOfMagnitude = $position == 0 ? 1 : pow(3, $position);
		$result += $orderOfMagnitude * $trinary;
	}

	return $result;
}
