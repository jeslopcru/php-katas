<?php

function from(\DateTime $date)
{
  $dateReturn = clone($date);
  $seconds = 1000000000;
  $dateReturn->add(new DateInterval("PT{$seconds}S"));

  return $dateReturn;
}
