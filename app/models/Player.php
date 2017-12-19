<?php 

namespace app\models;

abstract class Player
{

	public $positionX = '';

	public $positionY = '';

	public $hitPoints = 10;

	abstract public function go();
	abstract public function shoot();
	abstract public function hit();
	public function position()
	 {
	 	return array(
				'x' => $this->positionX,
				'y' => $this->positionY,
			);
	 }
	
}
?>