<?php

class Robot
{
	protected $name;

	public function __construct() {
		$this->reset();
	}

	public function reset()
	{
		$this->name = RandomRobotNameGenerator::generate();
	}

	public function getName()
	{
		return $this->name;
	}
}

class RandomRobotNameGenerator
{
	public static function generate()
	{
		$chars = range('A', 'Z');
		$nums = range('0', '9');
		
		$randCharKeys = array_rand($chars, 2);
		$randNumKeys = array_rand($nums, 3);

		$robotName = array_merge(
			[
				$chars[$randCharKeys[0]], 
				$chars[$randCharKeys[1]],
			], 
			[
				$nums[$randNumKeys[0]], 
				$nums[$randNumKeys[1]], 
				$nums[$randNumKeys[2]],
			]
		);

		return implode('', $robotName);
	}
}
