<?php

class Series
{
  protected $string;
  protected $length;
  protected $asArray;

  public function __construct($string)
  {
    if (preg_match('/[A-Za-z]/', $string)) {
      throw new \InvalidArgumentException();
    }

    $this->string = trim($string);
    $this->length = strlen($this->string);
    $this->asArray = str_split($this->string);
  }

  public function largestProduct($span)
  {
    if ($span == 0) {
      return 1;
    }

    $this->checkInvalidArgument($span);
    $largest = 0;
    for ($i = 0; $i <= $this->length-$span; $i++) {
      $current = array_slice($this->asArray, $i, $span);
      if (array_product($current) > $largest) {
        $largest = array_product($current);
      }
    }

    return $largest;
  }

  protected function checkInvalidArgument($span)
  {
    $negativeSpan = $span < 0;
    $zeroSpanAndEmptyString = $this->string == "" and $span > 0;
    $spanLongerThanString = $span > $this->length;
    if ($negativeSpan || $zeroSpanAndEmptyString || $spanLongerThanString) {
      throw new \InvalidArgumentException();
    }
  }
}
