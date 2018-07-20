<?php
//namespace controllers\Front;

use models\movies\MoviesManager;
//require('models/MoviesManager.php');
 function headBand(){
 	require('./views/pages/header.php');
 }
function mentions(){
	require('./views/pages/mentions.php');
}
function firstPageInfo(){
	//var_dump(MoviesManager());
	$LastMovie= new \models\movies\MoviesManager();
	$upDateMovie= $LastMovie->lastMovie();

	require('./views/pages/homepage.php');
}
function formulaire(){
	require('./views/pages/connexion.php');
}
function allMovies(){
	$listMovies= new \models\movies\MoviesManager();
	$Movies= $listMovies->moviesCall();
	require('./views/pages/films.php');
}
function oneMovie(){
	$oneMovies= new \models\movies\MoviesManager();
	$selectedMovie= $oneMovies->selectOneMovie();
	require('./views/pages/film.php');
}