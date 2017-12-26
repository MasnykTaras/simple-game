<?php 

use app\models\FirstPlayer;
use app\models\SecondPlayer;
use app\models\Rule;

class SiteController
{
	public function actionIndex(){

		$player__1 = new FirstPlayer();
		$player__2 = new SecondPlayer();

		$positionPlayer1 = $player__1->position();

		$positionPlayer2 = $player__2->position();			
		
		if(isset($_POST) && !empty($_POST) && !isset($_POST['destroy'])){

			$player__2->go($_POST['go']);

			$player__1->go($player__1->creatMove());			

			if(Rule::overPlacement($player__1->position(),$player__2->position())){

				$_SESSION["player__1"] = array(
					'position' =>  $player__1->position(),
					'hitspoints' => $player__1->hitPoints,
				);			
				$_SESSION["player__2"] = array(
					'position' =>  $player__2->position(),
					'hitspoints' => $player__2->hitPoints,
				);
			}
			

		}elseif($_POST['destroy']){

			session_destroy();

		}else{
			
			session_start();

			$_SESSION["player__1"] = array(
				'position' =>  $player__1->position(),
				'hitspoints' => $player__1->hitPoints,
			);

			$_SESSION["player__2"] = array(
				'position' => $player__2->position(), 
				'hitspoints' => $player__2->hitPoints,
			);
			
		}

		$positionPlayer1 = $_SESSION["player__1"];

		$positionPlayer2 = $_SESSION["player__2"];

		include_once(ROOT . '/views/site/index.php');

	}
	
}
?>