<?php
require_once("./models/AdminManager.php");
require_once("./models/movies.php");
require_once("./models/comments.php");

/*------------------------CONNEXION / Subscribtion-----------------------*/
function entry($pseudo,$pwd,$pseudoPresent){

	$newMember= new membersManager();
	$getNewMember= $newMember->NewUser($pseudo,$pwd,$pseudoPresent);

	//require('./views/pages/membre.php');
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

	$listMembers= new membersManager();
	$AllMembers=$listMembers->listMembers();
	

	$listModos= new membersManager();
	$AllModerateurs=$listModos->listModo();

	require('./views/pages/adminpage.php');
}
function addNewEntry($title,$resume,$releaseDate,$addLink,$resultat){
	$newMovie= new MoviesManager();
	$newEntry= $newMovie->addNewMovie($title,$resume,$releaseDate,$addLink,$resultat);
	
}
function upgradeMember($id_membre){
	$newModo= new membersManager();
	$Moderateur=$newModo->upGradeRights($id_membre);
}
function downGradeMember($id_membre){
	$downModo= new membersManager();
	$backMember= $downModo ->downGradeRights($id_membre);
}


/*--------------------ADMIN-PANNEL-------------------------------*/
