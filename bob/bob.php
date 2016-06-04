<?php

class Bob
{
  public function respondTo($something)
  {
    $something = trim($something);

    if ($something == "") {
      return 'Fine. Be that way!';
    }

    if ($something == strtoupper($something) && preg_match('/[A-Za-z]/', $something)) {
      return 'Whoa, chill out!';
    }

    if (substr($something, -1) == '?') {
      return 'Sure.';
    }

    return 'Whatever.';
  }
}
