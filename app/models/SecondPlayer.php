<?php 

namespace app\models;

use app\models\Player;

class SecondPlayer extends Player
	{
		public $positionX = 10;

		public $positionY = 5;

		public function go()
		{
			return 'go';
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