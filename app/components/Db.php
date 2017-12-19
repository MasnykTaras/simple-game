<?php

namespace app\components;

use PDO;

class Db
	{
		public static function getConnection()
		{

			$paramsPath = ROOT . '/app/config/db_params.php';
			$params = include ($paramsPath);
			$bsn = "mysql:host={$params['host']};dbname={$params['dbname']}";

 
			$db = new PDO($bsn, $params['user'], $params['pass']);
			
			return $db;
		}
	}	
?>