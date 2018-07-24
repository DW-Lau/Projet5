<?php
namespace models;
class Manager{

	protected function dbConnect(){
		try{
			$messageErrors = [
    			\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
	    		\PDO::ATTR_CASE => \PDO::CASE_NATURAL,
	    		\PDO::ATTR_ORACLE_NULLS => \PDO::NULL_EMPTY_STRING
			];
			$bdd=new \PDO('mysql:host=localhost;dbname=projet5;charset=utf8', 'root','',$messageErrors);
			
			return $bdd;
		}
		catch (PDOException $e){
			die('Erreur: Impossible de ce connecter à la base de données ' . $e->getmsg());
		}
	}
}
