<?php 

namespace app\models;

use app\models\Player;

class FirstPlayer extends Player
	{
		public $positionX = 0;

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

	?>