<?php
//namespace controllers\Front;
require "vendor/autoload.php";
use models\movies;
if(class_exists('Fetch\\ \models\movies\MoviesManager')){
	echo "string";}
	else{echo "raté";};
models\movies::MoviesManager();
//require('models/MoviesManager.php');

function headBand(){
	require('./views/pages/header.php');
}
function mentions(){
	require('./views/pages/mentions.php');
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
	$result= $oneMovies->selectOneMovie();
	require('./views/pages/film.php');
}