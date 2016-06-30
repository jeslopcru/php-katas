<?php

function toDecimal($trinary)
{
	$result = 0;
	$reversed = array_reverse(str_split($trinary));

	foreach ($reversed as $position => $trinary) {
		if (is_nan($trinary) || $trinary > 2 || $trinary < 0) {
			return 0;
		}

		$result += pow(3, $position) * $trinary;
	}

	return $result;
}
