<?php 

use app\models\FirstPlayer;
use app\models\SecondPlayer;

class SiteController
{
	public function actionIndex(){

		$player__1 = new FirstPlayer();
		$player__2 = new SecondPlayer();

		$positionPlayer1 = $player__1->position();

		$positionPlayer2 = $player__2->position();		
		
		
		if(isset($_POST) && !empty($_POST)){


			$player__2->go($_POST['go']);
			
			$_SESSION["player__2"] = array(
				'position' =>  $player__2->position(),
				'hitspoints' => $player__1->hitPoints,
			);

		}else{
			
			session_start();

			$_SESSION["player__2"] = array(
				'position' => $player__2->position(), 
				'hitspoints' => $player__1->hitPoints,
			);

			
		}

		$positionPlayer1 = $player__1->position();

		$positionPlayer2 = $_SESSION["player__2"];

		include_once(ROOT . '/views/site/index.php');

	}
	
}
?>