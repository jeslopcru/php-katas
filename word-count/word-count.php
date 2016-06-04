<?php

class Phrase
{
	protected $phrase;
	protected $wordCount = [];

	public function __construct($phrase) {
		$this->phrase = $phrase;
		$this->setWordCount();
	}

	public function wordCount() {
		return $this->wordCount;
	}

	protected function setWordCount() {
		$this->wordCount = PhraseUtils::getCount($this->phrase);
	}
}

final class PhraseUtils
{
	public static function lower($phrase) {
		return strtolower($phrase);
	}

	public static function normalize($phrase) {
		return trim(preg_replace( "/[^0-9a-z]+/i", " ", $phrase));
	}

	public static function toArray($normalizedPhrase) {
		return explode(' ', $normalizedPhrase);
	}

	public static function getCount($phrase) {
		$wordCount = [];
		$words = self::toArray(self::normalize(self::lower($phrase)));

		foreach($words as $word) {
			if (!in_array($word, array_keys($wordCount))) {
				$wordCount[$word] = 0;
			}

			$wordCount[$word]++;
		}

		return $wordCount;
	}
}

function wordCount($phrase) {
	$phraseInstance = new Phrase($phrase);
	return $phraseInstance->wordCount();
}
