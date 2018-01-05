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
			
			$player__1->go($player__1->creatMove());	

			$_SESSION["player__1"] = array(
					'position' =>  $player__1->position(),
					'hitspoints' => $_SESSION["player__1"]['hitspoints']
				);
		
			if(isset($_POST['go'])){

				$player__2->go($_POST['go']);	

				if(Rule::overPlacement($player__1->position(),$player__2->position())){
					$_SESSION["player__2"] = array(
							'position' =>  $player__2->position()							
					);		
				}
			}
			if(isset($_POST['shoot'])){

				$shoot = array(
					'x' => $_POST['shootMarkX'], 
					'y' => $_POST['shootMarkY']
				);

				$_SESSION["player__1"]['hitspoints'] = $player__2->shoot($_SESSION["player__1"]['position'], $shoot);	

			}				

			if($result = Rule::cheackHitpoint()){

				Rule::start($player__1, $player__2);	
				$advertisement = Rule::advertisement($result);					
			}	
						

		}elseif($_POST['destroy']){

			session_destroy();
			

		}else{

			Rule::start($player__1, $player__2);
						
			
		}



		$positionPlayer1 = $_SESSION["player__1"];

		$positionPlayer2 = $_SESSION["player__2"];

		include_once(ROOT . '/views/site/index.php');

	}
	
}
?>