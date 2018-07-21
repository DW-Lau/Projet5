<?php
//namespace models\movies;
//require('models/MoviesManager.php')
if(file_exists("./vendor/autoload.php")){
	echo "Le fichier est bien présent";
}
else{
	echo "introuvable";
	
}
require "./vendor/autoload.php";

 if(class_exists('models\movies\MoviesManager')){
	echo "la class existe";
}else{
	
	echo " mais la class n'existe pas ";
	echo __NAMESPACE__;
}
 echo models\movies\MoviesManager::MoviesManager();


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
	$listMovies= new \models\movies\MoviesManager();
	$Movies= $listMovies->moviesCall();
	require('./views/pages/films.php');
}
function oneMovie(){
	$oneMovies= new \models\movies\MoviesManager();
	$result= $oneMovies->selectOneMovie();
	require('./views/pages/film.php');
}