<?php

class Clock
{
    const MINUTES_TO_A_DAY = 1440;
    const MINUTES_TO_AN_HOUR = 60;

	protected $hours;
	protected $minutes;

	public function __construct($hours, $minutes = 0)
    {
		$totalMinutes = $minutes + ($hours * self::MINUTES_TO_AN_HOUR);
        $clockFromMinutes = $this->clockFromMinutes($totalMinutes);

        $this->hours = $clockFromMinutes['hours'];
        $this->minutes = $clockFromMinutes['minutes'];
	}

	public function add($minutes)
	{
		if ($minutes == 0) {
			return new self($this->hours, $this->minutes);
		}

        $clockFromMinutes = $this->clockFromMinutes($this->totalMinutes() + $minutes);

        return new self($clockFromMinutes['hours'], $clockFromMinutes['minutes']);
	}

    public function sub($minutes)
    {
        return $this->add(-$minutes);
    }

    public function __toString()
    {
        $stringHours = $this->formatNumber($this->hours);
        $stringMinutes = $this->formatNumber($this->minutes);

        return "{$stringHours}:{$stringMinutes}";
    }

	protected function formatNumber($number)
	{
		return str_pad($number, 2, 0, STR_PAD_LEFT);		
	}

    protected function sign($number) {
        return ($number > 0) ? 1 : (($number < 0) ? -1 : 0);
    }

    protected function totalMinutes() {
        return $this->minutes + (self::MINUTES_TO_AN_HOUR * $this->hours);
    }

    protected function clockFromMinutes($minutes)
    {
        $minutesSign = self::sign($minutes);
        $absMinutes = abs($minutes);
        $minutesToClock = $absMinutes % self::MINUTES_TO_A_DAY;

        if ($minutesSign < 0) {
            $minutesToClock = self::MINUTES_TO_A_DAY - $minutesToClock;
        }

        return [
            'hours' => intval($minutesToClock / self::MINUTES_TO_AN_HOUR),
            'minutes' => $minutesToClock % self::MINUTES_TO_AN_HOUR,
        ];
    }
}
