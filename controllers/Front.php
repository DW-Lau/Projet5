<?php
require_once("./models/AdminManager.php");
require_once("./models/movies.php");


function headBand(){
	require('./views/pages/header.php');
}
function firstPageInfo(){
	$LastMovie= new MoviesManager();
	$upDateMovie= $LastMovie->lastMovie();

	require('./views/pages/homepage.php');
}
function formulaire(){
	require('./views/pages/connexion.php');
}
function allMovies(){
	$listMovies= new MoviesManager();
	$Movies= $listMovies->moviesCall();
	require('./views/pages/films.php');
}
function oneMovie(){
	$oneMovies= new MoviesManager();
	$selectedMovie= $oneMovies->moviesCall();
	require('./views/pages/film.php');
}