<?php

namespace app\models;

abstract class Rule
{

	private static $areaSize = 5;
	/**
	 * Check if players one behind the other
	 * @param array $player__1 
	 * @param array $player__2 
	 * @return boolean
	 */
	static public function overPlacement($player__1, $player__2)
	{
			if(($player__1['x'] == $player__2['x']) && ($player__1['y'] == $player__2['y'])){
				return false;
			}
			return true;
	}
	/**
	 * Cheack if hitpoint is over 
	 * @return bool/str
	 */
	static public function cheackHitpoint()
	{

		if($_SESSION["player__1"]['hitspoints'] <= 0 ){
			return 'Second';
		}
		if($_SESSION["player__2"]['hitspoints'] <= 0 ){
			return 'First';
		
		}
			return false;
	}
	/**
	 * Start sesion (game)
	 * @param obj $player__1 
	 * @param obj $player__2 	
	 */
	static public function start($player__1, $player__2)
	{		

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
	/**
	 * View advertisement winer
	 * @param str $result 
	 * @return str
	 */
	static public function advertisement($result)
	{
		return "<div class='reuslt'>
					<div class='content'>
						<p>$result player Win</p>
						<a href='/'>Restart game</a>
					</div>
				</div>";
	}
	/**
	 * Get play area size
	 * @return int
	 */
	static public function getSizeArea()
	{
		return self::$areaSize;
	}

	static public function getHit()
	{
		if($_SESSION["player__1"]['position']['x'] == $_SESSION["player__2"]['position']['x'] || $_SESSION["player__1"]['position']['y'] == $_SESSION["player__2"]['position']['y']){
			if(pow($_SESSION["player__1"]['position']['x'] - $_SESSION["player__2"]['position']['x'], 2) == 1 || pow($_SESSION["player__1"]['position']['y'] - $_SESSION["player__2"]['position']['y'], 2) == 1 ){

				return true;
			}
		}
		return false;
	}

	static public function checkPositionP1($player__1, $player__2)
	{
		if(Rule::overPlacement($player__1->position(),$player__2->position())){

			$_SESSION["player__1"]['position'] = $player__1->position();		

		}
	}

}

?>