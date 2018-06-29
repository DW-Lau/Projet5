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

function  getInfoUser($idMembre){
	$infoUser= new membersManager();
	$userInfo=$infoUser->getInfo($idMembre);
	
	$getAllWarningComm= new CommentsManager();
	$listWarningComm=$getAllWarningComm->listWarningComm(); 

	require('./views/pages/membre.php');
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
	
	$getAllWarningComm= new CommentsManager();
	$listWarningComm=$getAllWarningComm->listWarningComm(); 


	$listModos= new membersManager();
	$AllModerateurs=$listModos->listModo();

	require('./views/pages/adminpage.php');
	
}
function addNewEntry($title,$resume,$releaseDate,$addLink,$resultat){
	$newMovie= new MoviesManager();
	$newEntry= $newMovie->addNewMovie($title,$resume,$releaseDate,$addLink,$resultat);
}
function editEntry($movieEdit){
	$edit= new MoviesManager();
	$editMovie= $edit->editedMovie($movieEdit);
	require('./views/pages/editFilm.php');
}
function submitEntry($movieEdit,$newtitle,$newresume,$newreleaseDate,$newLink,$resultat){

	$submit= new MoviesManager();
	$submitMovie= $submit->submitedMovie($movieEdit,$newtitle,$newresume,$newreleaseDate,$newLink,$resultat);
	//require('./views/pages/adminpage.php');
}
function deleteMovie($moviedeleted){
	$dlt= new MoviesManager();
	$dltMv=$dlt->eraseChapter($moviedeleted);
}
function upgradeMember($id_membre){
	$newModo= new membersManager();
	$Moderateur=$newModo->upGradeRights($id_membre);
}
function downGradeMember($id_membre){
	$downModo= new membersManager();
	$backMember= $downModo ->downGradeRights($id_membre);
}

function createdTopic($auteurTopic,$titreTopic,$messageTopic){
	
	$newTopic= new CommentsManager();
	$newSubject=$newTopic->createdTopic($auteurTopic,$titreTopic,$messageTopic);
}
/*--------------------ADMIN-PANNEL-------------------------------*/
/*--------------------------- FORUM -----------------------------*/
function allTopics(){
	$topics= new CommentsManager();
	$getTopics= $topics->getAllTopics();
	require("./views/pages/forum.php");

	if(isset($_SESSION['id'])&&$_SESSION['droits']!==1){
		require("./views/pages/newtopic.php");
	}
}
function selectTopic($topic){
	$oneTopic= new CommentsManager();
	$picked= $oneTopic->oneTopic($topic);

	$answers= new CommentsManager();
	$allAnswers=$answers->answerOneTopic($topic);

	require('./views/pages/topic.php');
}
function deleteTopic($idTopic){
	$dlt= new CommentsManager();
	$eraseTopic=$dlt->deletTopic($idTopic);	
		require('./views/pages/forum.php');
	}
function newComment($idTopic,$idAuteur,$textTopic){
	$newComm= new CommentsManager();
	$addNewComm= $newComm-> addnewComment($idTopic,$idAuteur,$textTopic);
	require('./views/pages/topic.php');
}
function warningComm($idTopic,$idSubject){
	$wngComm= new CommentsManager();
	$warningComment= $wngComm->WarningComment($idTopic,$idSubject);
	//require('./views/pages/topic.php');
}

function deleteComm($idSubject){
	$deleteComm= new CommentsManager();
	$deletingComment=$deleteComm->eraseComment($idSubject);
}
function confirmComm($idSubject){
	$conf= new CommentsManager();
	$confComm= $conf->confirmComment($idSubject);
}