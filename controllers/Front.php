<?php
//namespace controllers\Front;
require "vendor/autoload.php";
use modelMovie ;
//require('models/MoviesManager.php');
if(class_exists('modelMovie\MoviesManager')){
	echo "la class existe";
}else{
	echo __NAMESPACE__;
	echo "la class n'existe pas ";
}
modelMovie::MoviesManager();


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