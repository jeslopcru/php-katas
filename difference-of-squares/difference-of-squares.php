<?php

function squareOfSums($num)
{
	$sum = sumUpTo($num);

	return pow($sum, 2);
}

function sumOfSquares($num)
{
	$squares = squares($num);

	return array_sum($squares);
}

function difference($num)
{
	return squareOfSums($num) - sumOfSquares($num);
}

function sumUpTo($num)
{
	$sum = 0;
	for($i = $num; $i>0; $i--) {
		$sum += $i;
	}

	return $sum;
}

function squares($num)
{
	$squares = array();
	for($i = $num; $i>0; $i--) {
		$squares[] = pow($i, 2);
	}

	return $squares;
}
