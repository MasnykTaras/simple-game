<?php 

namespace app\models;

use app\models\Player;
use app\models\Rule;

class SecondPlayer extends Player
	{
		public $positionX = 10;

		public $positionY = 5;

		public function go($directions)
		{
			
			$nextStep = $this->move[$directions];

			if($nextStep['axis'] == 'x'){

				$newPosition = $_SESSION["player__2"]['position']['x'] + $nextStep['vlue'];
				$oldPostitionX = $_SESSION["player__2"]['position']['x'];
				
				if($newPosition > 10 || $newPosition < 0){
						$this->positionX = $_SESSION["player__2"]['position']['x'];
				}else{

						$this->positionX = $newPosition;					
				}
				$this->positionY = $_SESSION["player__2"]['position']['y'];
			}

			if($nextStep['axis'] == 'y'){
				$newPosition = $_SESSION["player__2"]['position']['y'] + $nextStep['vlue'];

				$oldPostitionY = $_SESSION["player__2"]['position']['y'];
				
				if($newPosition > 10 || $newPosition < 0 ){
					$this->positionY = $_SESSION["player__2"]['position']['y'];
				}else{
					$this->positionY = $newPosition;					
				}
				$this->positionX = $_SESSION["player__2"]['position']['x'];
			}

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