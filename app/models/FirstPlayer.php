<?php 

namespace app\models;

use app\models\Player;
use app\models\Rule;

class FirstPlayer extends Player
	{
		public $positionX = 0;

		public $positionY = 5;

		public function go($directions)
		{	
			
			$nextStep = $this->move[$directions];

			if($nextStep['axis'] == 'x'){

				$newPosition = $_SESSION["player__1"]['position']['x'] + $nextStep['vlue'];

				$oldPostitionX = $_SESSION["player__1"]['position']['x'];				
				if($newPosition > 10 || $newPosition < 0 ){
					$this->positionX = $_SESSION["player__1"]['position']['x'];
				}else{					
					
						$this->positionX = $newPosition;					
				}

				
				$this->positionY = $_SESSION["player__1"]['position']['y'];
			}

			if($nextStep['axis'] == 'y'){

				$newPosition = $_SESSION["player__1"]['position']['y'] + $nextStep['vlue'];

				$oldPostitionY = $_SESSION["player__1"]['position']['y'];
				
				
				if($newPosition > 10 || $newPosition < 0){
					$this->positionY = $_SESSION["player__1"]['position']['y'];
				}else{
					
						$this->positionY = $newPosition;										
				}
				
				$this->positionX = $_SESSION["player__1"]['position']['x'];
			}
		}
		public function creatMove()
		{
			$move = array('top', 'down', 'left', 'right');
			// $moveKey = array_rand($move, 1);
			return $move[array_rand($move, 1)];
		}
		public function shoot()
		{
			return 'shoot';
		}
		public function hit()
		{
			return 'hit';
		}
	}

	?>