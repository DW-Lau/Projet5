<?php
namespace models\movies;
use \models\Manager;
require "./vendor/autoload.php";

class MoviesManager extends Manager{

	public function lastMovie(){
			$bdd=parent::dbConnect();
			$lastMovieOut= $bdd->query('SELECT id_film,titre_film,SUBSTR(resume, 1, 250)as resume,date_format(date_sortie,"%d.%m.%y")as date_fr, movie_link, img_link FROM films ORDER BY date_sortie desc LIMIT 0,1');
			return $lastMovieOut;
		}
	public function moviesCall(){
		$bdd=parent::dbConnect();
		$movies= $bdd->query('SELECT id_film,titre_film,SUBSTR(resume, 1, 150)as resume,date_format(date_sortie,"%d.%m.%y")as date_fr, movie_link,img_link FROM films ORDER BY date_sortie DESC');	
		return $movies;
	}

	public function selectOneMovie(){
		$bdd=parent::dbConnect();
		$selectOne=$bdd->prepare('SELECT id_film,titre_film,resume,date_format(date_sortie,"%d.%m.%y")as date_fr,movie_link, img_link FROM films WHERE id_film=:idFilm ORDER BY date_sortie desc ');
		$selectOne->execute(array(
			'idFilm'=>$_GET['id']
		 	 ));
		try{
			$result=$selectOne->fetch();
				if (!$result) {
				$message="Le film que vous recherchez ne trouve aucune correspondances dans notre base de données. Veuillez retournez à la liste des films pour voir ceux présents. ";
				throw new \Exception($message);
				}
				else{
					return $result;
				}
		}catch( \Exception $e){
			die("<section><p>".$message."</p></section>");
		}
	}
	
	public function addNewMovie($title,$resume,$releaseDate,$addLink,$resultat){
		$bdd=parent::dbConnect();
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
		$bdd=parent::dbConnect();
		$editAMovie=$bdd->prepare('SELECT id_film,titre_film,resume,date_format(date_sortie,"%d.%m.%y")as date_fr,movie_link, img_link FROM films WHERE id_film=:idFilm ');
		$editAMovie->execute(array(
			'idFilm'=>$movieEdit
		));
		return $editAMovie;
	}

	public function submitedMovie($movieEdit,$newtitle,$newresume,$newreleaseDate,$newLink,$resultat){
		$bdd=parent::dbConnect();
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
	
	public function eraseChapter($moviedeleted){//This function will deleted
		$bdd=parent::dbConnect();
		$dltAMovie=$bdd->prepare('DELETE FROM films WHERE id_film= :id');
		$eraseComms=$dltAMovie->execute(array(
			'id'=>$moviedeleted));
		header("Location:./index.php?action=admin");
	}
}