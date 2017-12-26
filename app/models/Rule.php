<?php

namespace app\models;

abstract class Rule
{
	/**
	 * Check if players one behind the other
	 * @param array $player__1 
	 * @param array $player__2 
	 * @return boolean
	 */
	static function overPlacement($player__1, $player__2)
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

}

?>