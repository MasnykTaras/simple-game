<?php 

namespace app\models;

use app\models\Player;
use app\models\Rule;

class FirstPlayer extends Player
	{
		public $positionX;

		public $positionY;

		public function go($directions)
		{	
			
			$nextStep = $this->move[$directions];

			if($nextStep['axis'] == 'x'){

				$newPosition = $_SESSION["player__1"]['position']['x'] + $nextStep['vlue'];

				$oldPostitionX = $_SESSION["player__1"]['position']['x'];				
				if($newPosition > Rule::getSizeArea() || $newPosition < 1 ){
					$this->positionX = $_SESSION["player__1"]['position']['x'];
				}else{					
					
						$this->positionX = $newPosition;					
				}

				
				$this->positionY = $_SESSION["player__1"]['position']['y'];
			}

			if($nextStep['axis'] == 'y'){

				$newPosition = $_SESSION["player__1"]['position']['y'] + $nextStep['vlue'];

				$oldPostitionY = $_SESSION["player__1"]['position']['y'];
				
				
				if($newPosition > Rule::getSizeArea() || $newPosition < 1){
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
			// $move  = array('right');
		
			return $move[array_rand($move, 1)];
		}
		public function shoot($pPosition, $shoot)
		{
			if($pPosition['x'] == $shoot['x'] && $pPosition['y'] == $shoot['y']){
				$newHit =  $_SESSION["player__1"]['hitspoints'] - 1;
			}else{
				$newHit =  $_SESSION["player__1"]['hitspoints'];
			}
			
			return $this->hitPoints = $newHit;
			
		}
		public function hit()
		{
			return 'hit';
		}
	}

	?>