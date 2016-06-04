<?php

class AnagramDetector
{
	protected $word;
	protected $possibleAnagrams;
	protected $anagrams = [];

	public function __construct($word, $possibleAnagrams)
	{
		$this->word = $word;
		$this->possibleAnagrams = $possibleAnagrams;
		$this->detectAnagrams();
	}

	public function getAnagrams()
	{
		return $this->anagrams;
	}

	protected function detectAnagrams()
	{
		foreach ($this->possibleAnagrams as $possible) {
			if (!in_array($possible, $this->anagrams) and AnagramUtils::isAnagram($this->word, $possible)) {
				$this->anagrams[] = $possible;
			}
		}		
	}
}

final class AnagramUtils
{
	public static function isAnagram($word, $possibleAnagram)
	{
		$wordArray = preg_split('//u', mb_strtolower($word), -1, PREG_SPLIT_NO_EMPTY);
		$possibleArray = preg_split('//u', mb_strtolower($possibleAnagram), -1, PREG_SPLIT_NO_EMPTY);

		if (ArrayUtils::identical($possibleArray, $wordArray)) {
			if (strtolower($word) != strtolower($possibleAnagram)) {
				return true;
			}
		}

		return false;
	}
}

final class ArrayUtils
{
	public static function identical($fistArray, $secondArray)
	{
		sort($fistArray);
		sort($secondArray);

		return $fistArray == $secondArray;
	}
}

function detectAnagrams($word, $possibleAnagrams) {
	$anagramDetector = new AnagramDetector($word, $possibleAnagrams);

	return $anagramDetector->getAnagrams();
}
