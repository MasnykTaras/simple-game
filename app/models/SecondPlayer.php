<?php 

namespace app\models;

use app\models\Player;
use app\models\Rule;

class SecondPlayer extends Player
	{
		public $positionX;

		public $positionY;

		public function go($directions)
		{
			
			$nextStep = $this->move[$directions];

			if($nextStep['axis'] == 'x'){

				$newPosition = $_SESSION["player__2"]['position']['x'] + $nextStep['vlue'];
				$oldPostitionX = $_SESSION["player__2"]['position']['x'];
				
				if($newPosition > Rule::getSizeArea() || $newPosition < 1){
						$this->positionX = $_SESSION["player__2"]['position']['x'];
				}else{

						$this->positionX = $newPosition;					
				}
				$this->positionY = $_SESSION["player__2"]['position']['y'];
			}

			if($nextStep['axis'] == 'y'){
				$newPosition = $_SESSION["player__2"]['position']['y'] + $nextStep['vlue'];

				$oldPostitionY = $_SESSION["player__2"]['position']['y'];
				
				if($newPosition > Rule::getSizeArea() || $newPosition < 1 ){
					$this->positionY = $_SESSION["player__2"]['position']['y'];
				}else{
					$this->positionY = $newPosition;					
				}
				$this->positionX = $_SESSION["player__2"]['position']['x'];
			}

		}
		public function shoot($pPosition, $shoot)
		{
			$newHit = $_SESSION["player__1"]['hitspoints'] - 1;
			if($pPosition['x'] == $shoot['x'] && $pPosition['y'] == $shoot['y']){
				$this->hitPoints = $newHit;
				return 'hit';
			}else{
				$this->hitPoints =  $_SESSION["player__1"]['hitspoints'];
			}
			
			
		}
		public function hit()
		{
			return 'hit';
		}
		
	}