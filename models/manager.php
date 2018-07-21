<?php
class Manager{

	protected function dbConnect(){
		try{
			$bdd=new PDO('mysql:host=localhost;dbname=projet5;charset=utf8', 'root','');
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $bdd;
		}
		catch (Exception $e){
			die('Erreur: Impossible de ce connecter à la base de données ' . $e->getmsg());
		}
	}
}