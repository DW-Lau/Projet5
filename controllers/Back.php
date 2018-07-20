<?php
//namespace controllers\Back;
use models\members;
use models\movies;
use models\comments;

/*------------------------CONNEXION / Subscribtion-----------------------*/
function entry($pseudo,$pwd,$pseudoPresent){

	$newMember= new \models\members\membersManager();
	$getNewMember= $newMember->NewUser($pseudo,$pwd,$pseudoPresent);
	//A redirection will be done on the Adminpage.php
}
function checkInfo($checkPseudo,$checkpwd){
	$checkUser= new \models\members\membersManager();
	$userLogin= $checkUser->checkInfo($checkPseudo,$checkpwd);
	//A redirection will be done on the Adminpage.php
}

function  getInfoUser($idMembre){
	$infoUser= new \models\members\membersManager();
	$userInfo=$infoUser->getInfo($idMembre);
	
	$getAllWarningComm= new \models\comments\CommentsManager();
	$listWarningComm=$getAllWarningComm->listWarningComm(); 
	
	require('./views/pages/membre.php');
}

function sessionOut(){
	require('./index.php');
}
function getNewAvatar($idAvatar,$idMembre){
	$newProfilPicture= new \models\members\membersManager();
	$newPicture=$newProfilPicture->newAvatarProfil($idAvatar,$idMembre);
	//A redirection will be done on the Adminpage.php
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
function adminPage($idMembre){
	$listMovies= new \models\movies\MoviesManager();
	$Movies= $listMovies->moviesCall();

	$listMembers= new \models\members\membersManager();
	$AllMembers=$listMembers->listMembers();
	
	$getAllWarningComm= new \models\comments\CommentsManager();
	$listWarningComm=$getAllWarningComm->listWarningComm(); 


	$infoUser= new \models\members\membersManager();
	$userInfo=$infoUser->getInfo($idMembre);

	$listModos= new \models\members\membersManager();
	$AllModerateurs=$listModos->listModo();

	$topics= new \models\comments\CommentsManager();
	$getTopics= $topics->getAllTopics();
	
	require('./views/pages/adminpage.php');
	
}
function addNewEntry($title,$resume,$releaseDate,$addLink,$resultat){
	$newMovie= new \models\movies\MoviesManager();
	$newEntry= $newMovie->addNewMovie($title,$resume,$releaseDate,$addLink,$resultat);
}
function editEntry($movieEdit){
	$edit= new \models\movies\MoviesManager();
	$editMovie= $edit->editedMovie($movieEdit);
	require('./views/pages/editFilm.php');
}
function submitEntry($movieEdit,$newtitle,$newresume,$newreleaseDate,$newLink,$resultat){

	$submit= new \models\movies\MoviesManager();
	$submitMovie= $submit->submitedMovie($movieEdit,$newtitle,$newresume,$newreleaseDate,$newLink,$resultat);
	//A redirection will be done on the Adminpage.php
}
function deleteMovie($moviedeleted){
	$dlt= new \models\movies\MoviesManager();
	$dltMv=$dlt->eraseChapter($moviedeleted);
}
function upgradeMember($id_membre){
	$newModo= new \models\members\membersManager();
	$Moderateur=$newModo->upGradeRights($id_membre);
}
function downGradeMember($id_membre){
	$downModo= new \models\members\membersManager();
	$backMember= $downModo ->downGradeRights($id_membre);
}

function createdTopic($auteurTopic,$titreTopic,$messageTopic){
	
	$newTopic= new \models\comments\CommentsManager();
	$newSubject=$newTopic->createdTopic($auteurTopic,$titreTopic,$messageTopic);
	//A redirection will be done on the comments.php
}
function chooseAvatar(){
	$selectAvatar= new \models\members\membersManager();
	$pickAvatar= $selectAvatar->choseAvatar();
	require('./views/pages/selectAvatar.php');
}
function changeAvatar($idMembre,$idAvatar){
	$newPick= new \models\members\membersManager();
	$newProfil=$newPick->newAvatar($idMembre,$idAvatar);
}
/*--------------------ADMIN-PANNEL-------------------------------*/
/*--------------------------- FORUM -----------------------------*/
function allTopics(){
	$topics= new \models\comments\CommentsManager();
	$getTopics= $topics->getAllTopics();
	
	require("./views/pages/forum.php");
}
function selectTopic($topic){
	$oneTopic= new \models\comments\CommentsManager();
	$picked= $oneTopic->oneTopic($topic);

	$answers= new \models\comments\CommentsManager();
	$allAnswers=$answers->answerOneTopic($topic);

	require('./views/pages/topic.php');
}
function deleteTopic($idTopic){
	$dlt= new \models\comments\CommentsManager();
	$eraseTopic=$dlt->deletTopic($idTopic);	
		//A redirection will be done on the comments.php
	}
function newComment($idTopic,$idAuteur,$textTopic){
	$newComm= new \models\comments\CommentsManager();
	$addNewComm= $newComm-> addnewComment($idTopic,$idAuteur,$textTopic);
	//A redirection will be done on the comments.php
}
function warningComm($idTopic,$idSubject){
	$wngComm= new \models\comments\CommentsManager();
	$warningComment= $wngComm->WarningComment($idTopic,$idSubject);
	//A redirection will be done on the comments.php
}

function deleteComm($idSubject){
	$deleteComm= new \models\comments\CommentsManager();
	$deletingComment=$deleteComm->eraseComment($idSubject);
}
function confirmComm($idSubject){
	$conf= new \models\comments\CommentsManager();
	$confComm= $conf->confirmComment($idSubject);
}