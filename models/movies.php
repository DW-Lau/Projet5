<?php
require_once("manager.php");

class MoviesManager extends Manager{

	public function moviesCall(){
		$bdd=$this->dbConnect();
		$movies= $bdd->query('SELECT id_film,titre_film,resume,date_format(date_sortie,"%d.%m.%y")as date_fr FROM films ORDER BY date_sortie ');	
		return $movies;
	}

	public function selectOneMovie(){
		$bdd=$this->dbConnect();
		$selectOne=$bdd->prepare('SELECT id_film,titre_film,resume,date_format(date_sortie,"%d.%m.%y")as date_fr FROM films WHERE id=:idFilm ');
		$selectOne->execute(array(
			'idFilm'=>$_GET['id']
		 	 ));
		return $selectOne;
	}
	public function lastMovie(){
		$bdd=$this->dbConnect();
		$lastMovieOut= $bdd->query('SELECT id_film,titre_film,SUBSTR(resume, 1, 250)as resume,date_format(date_sortie,"%d.%m.%y")as date_fr FROM films ORDER BY date_sortie LIMIT 0,1');
		return $lastMovieOut;
	}
}