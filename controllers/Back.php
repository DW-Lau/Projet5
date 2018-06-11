<?php
require_once("./models/AdminManager.php");
require_once("./models/movies.php");
require_once("./models/comments.php");

/*------------------------CONNEXION / Subscribtion-----------------------*/
function entry($pseudo,$pwd,$pseudoPresent){

	$newMember= new membersManager();
	$getNewMember= $newMember->NewUser($pseudo,$pwd,$pseudoPresent);

	require('./views/pages/membre.php');
}
function checkInfo($checkPseudo,$checkpwd){
	$checkUser= new membersManager();
	$userLogin= $checkUser->checkInfo($checkPseudo,$checkpwd);
	//A redirection will be done on the Adminpage.php
}

function sessionOut(){
	require('./index.php');
}

/*--------------------------------MESSAGE LOGIN----------------------------------------*/
function msgPWD($message){
	$message;

	require('./views/pages/connexion.php');
}
function msgMail($message){
	$message;

	require('./views/pages/connexion.php');
}

function infoIssues($infoIssues){
	$infoIssues;
	require('./views/pages/connexion.php');
}
function noNickName($noNickName){

	$noNickName;
	require('./views/pages/connexion.php');
}
function NoMatch($NoMatch){
	$NoMatch;

	require('./views/pages/connexion.php');
}
/*--------------------------------END MESSAGES----------------------------------------*/
/*--------------------------------ADMIN SECTION----------------------------------------*/
function adminPage(){

	$listMovies= new MoviesManager();
	$Movies= $listMovies->moviesCall();

	
	require('./views/pages/adminpage.php');
}



/*--------------------ADMIN-PANNEL-------------------------------*/
