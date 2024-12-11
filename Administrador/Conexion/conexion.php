<?php
class Conexion
{
	static function conectar()
	{
	   $link = new PDO("mysql:host=localhost;dbname=beart",
						"root",
						"");
	   $link->exec("set names utf8");
		return $link;
	}
}