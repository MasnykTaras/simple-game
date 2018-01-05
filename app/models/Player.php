<?php 

namespace app\models;

abstract class Player
{

	public $positionX = '';

	public $positionY = '';

	public $hitPoints = 2;

	public $move = array(
				'top' => array(
						'vlue' => -1,
						'axis' => 'y',
				), 
				'down' =>array(
						'vlue' => 1,
						'axis' => 'y',
				),
				'right' => array(
						'vlue' => 1,
						'axis' => 'x',
				), 
				'left' => array(
						'vlue' => -1,
						'axis' => 'x',
				),
			);
	public function position()
	{
	 	return array(
				'x' => $this->positionX,
				'y' => $this->positionY,
			);
	}
	public function getHitpoint()
	{
	 	return $this->hitPoints;
	}

	abstract public function go($nextStep);
	abstract public function shoot($pPosition, $shoot);
	abstract public function hit();
	
	
}
?>