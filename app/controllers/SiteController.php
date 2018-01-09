<?php 

use app\models\FirstPlayer;
use app\models\SecondPlayer;
use app\models\Rule;

class SiteController
{
	public function actionIndex(){

		$player__1 = new FirstPlayer();
		$player__2 = new SecondPlayer();

		$sizeArea = Rule::getSizeArea();

		$areaWidth = ($sizeArea )  * 50 + 20;

		$player__1->positionX = 1;
		$player__1->positionY = ceil($sizeArea/2);
		$player__2->positionX = $sizeArea;
		$player__2->positionY = floor($sizeArea/2);

		$positionPlayer1 = $player__1->position();

		$positionPlayer2 = $player__2->position();			
		
			

		if(isset($_POST) && !empty($_POST) && !isset($_POST['destroy'])){
			
			

			$player__1->go($player__1->creatMove());
				
			
			if(isset($_POST['go'])){

				$player__2->go($_POST['go']);	

				if(Rule::overPlacement($player__1->position(),$player__2->position())){

					$_SESSION["player__2"]['position'] = $player__2->position();		

				}

			}
			if(Rule::overPlacement($player__1->position(),$player__2->position())){

				$_SESSION["player__1"]['position'] = $player__1->position();		

			}
			if(isset($_POST['shoot'])){

				$shoot = array(
					'x' => $_POST['shootMarkX'], 
					'y' => $_POST['shootMarkY']
				);

				if($player__2->shoot($_SESSION["player__1"]['position'], $shoot)){

					$_SESSION["player__1"]['hitspoints'] = $_SESSION["player__1"]['hitspoints'] - 1;

				}				

			}				

			

			if($result = Rule::cheackHitpoint()){						

				$advertisement = Rule::advertisement($result);		

			}							

		}elseif($_POST['destroy']){

			session_destroy();			

		}else{

			Rule::start($player__1, $player__2);						
			
		}

		echo "P1";
		var_dump($_SESSION["player__1"]);
		echo "P2";
		var_dump($_SESSION["player__2"]);

		$positionPlayer1 = $_SESSION["player__1"];

		$positionPlayer2 = $_SESSION["player__2"];

		include_once(ROOT . '/views/site/index.php');

	}
	
}
?>