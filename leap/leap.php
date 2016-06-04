<?php

function isLeap($year)
{
	return by400($year) or (by4($year) and notBy100($year));
}

function by4($number)
{
	return $number % 4 == 0;
}

function notBy100($number)
{
	return $number % 100 != 0;
}

function by400($number)
{
	return $number % 400 == 0;
}
