<?php
require_once("manager.php");

class MoviesManager extends Manager{

	public function moviesCall(){
		$bdd=$this->dbConnect();
		$movies= $bdd->query('SELECT id_film,titre_film,resume,date_format(date_sortie,"%d.%m.%y")as date_fr, movie_link,img_link FROM films ORDER BY date_sortie ');	
		return $movies;
	}

	public function selectOneMovie(){
		$bdd=$this->dbConnect();
		$selectOne=$bdd->prepare('SELECT id_film,titre_film,resume,date_format(date_sortie,"%d.%m.%y")as date_fr,movie_link, img_link FROM films WHERE id=:idFilm ');
		$selectOne->execute(array(
			'idFilm'=>$_GET['id']
		 	 ));
		return $selectOne;
	}
	public function lastMovie(){
		$bdd=$this->dbConnect();
		$lastMovieOut= $bdd->query('SELECT id_film,titre_film,SUBSTR(resume, 1, 250)as resume,date_format(date_sortie,"%d.%m.%y")as date_fr, movie_link, img_link FROM films ORDER BY date_sortie desc LIMIT 0,1');
		
		return $lastMovieOut;
	}

	public function addNewMovie($title,$resume,$releaseDate,$addLink,$resultat){
		$bdd=$this->dbConnect();
		$NewMovie= $bdd->prepare('INSERT INTO films(titre_film,resume,date_sortie,movie_link,img_link) VALUES (:titre,:resume,:dateSortie,:lien,:cheminImg)');
		$NewMovie->execute(array(
			'titre'=>$title,
			'resume'=>$resume,
			'dateSortie'=>$releaseDate,
			'lien'=>$addLink,
			'cheminImg'=>$resultat
		));
		 header("Location:./index.php?action=admin");
	}
	public function editedMovie($movieEdit){
		$bdd=$this->dbConnect();
		$editAMovie=$bdd->prepare('SELECT id_film,titre_film,resume,date_format(date_sortie,"%d.%m.%y")as date_fr,movie_link, img_link FROM films WHERE id_film=:idFilm ');
		$editAMovie->execute(array(
			'idFilm'=>$movieEdit
		));
		return $editAMovie;
	}
	public function submitedMovie($movieEdit,$newtitle,$newresume,$newreleaseDate,$newLink,$resultat){
		$bdd=$this->dbConnect();
		$submit=$bdd->prepare('UPDATE films SET titre_film= :titre , resume= :resume, date_sortie = :datesortie,movie_link= :linkmovie , img_link= :imglink WHERE id_film=:id ');
		$submit->execute(array(
			'id'=>$movieEdit,
			'titre'=>$newtitle,
			'resume'=>$newresume,
			'datesortie' =>$newreleaseDate,
			'linkmovie'=> $newLink,
			'imglink'=>$resultat
			));
		 header("Location:./index.php?action=admin");
	}
	public function eraseChapter($movieEdit){//This function will deleted
		$bdd=$this->dbConnect();
		$dltAMovie=$bdd->prepare('DELETE FROM films WHERE id_film=?');
		$eraseComms=$dltAMovie->execute(array($movieEdit));
		header("Location:./index.php?action=admin");
	}
}