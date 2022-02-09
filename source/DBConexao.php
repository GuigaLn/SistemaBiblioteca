<?php

abstract class DBConexao{
	
	private static $instance;
	const USER = "root";
	const PASSWORD = "";
	
	public static function getInstance(){
		
		try{
			if(self::$instance == null){
				
				$stringConexao = "mysql:host=localhost;port=3306;dbname=backupb";
				
				self::$instance = new PDO($stringConexao, self::USER, self::PASSWORD);
				self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				self::$instance->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES utf8");				
			} 
		}catch(PDOException $exception){
			die("<h1>Erro Ao Continuar...</h1>");
		}
		
		return self::$instance;
	}
}