<?php

namespace app\models;

abstract class Rule
{

	private static $areaSize = 3;
	/**
	 * Check if players one behind the other
	 * @param array $player__1 
	 * @param array $player__2 
	 * @return boolean
	 */
	static public function overPlacement($player__1, $player__2)
	{
			$p1positionX = $player__1['x'];
			$p1positionY = $player__1['y'];

			$p2positionX = $player__2['x'];
			$p2positionY = $player__2['y'];			

			if(($p1positionX == $p2positionX) && ($p1positionY == $p2positionY)){
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

	static public function getSizeArea()
	{
		return self::$areaSize;
	}

}

?>