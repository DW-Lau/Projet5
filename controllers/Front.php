<?php
require_once("./models/Adminpage.php");
require_once("./models/movies.php");


function headBand(){
	require('./views/pages/header.php');
}
function firstPageInfo(){
	$LastMovie= new MoviesManager();
	$upDateMovie= $LastMovie->lastMovie();

	require('./views/pages/homepage.php');

}