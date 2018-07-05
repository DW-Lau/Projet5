<?php
session_start();
require("controllers/Front.php");
require ("controllers/Back.php");


headBand();
if (!(isset($_GET['action']) ) ) {
		//headBand();
		firstPageInfo();}

if (isset($_GET['action'])){

	if($_GET['action']=='logOut'){//log ou session
		session_destroy();
		header("Location:index.php");
	}

/*--------------------------------LOGIN / SUBSCRIBE----------------------------------------*/
if($_GET['action']=='connexion'){
	 	//headBand();
	 	formulaire();
}
if ($_GET['action']=='subscribeMember') {
	$pseudo = htmlspecialchars($_POST['pseudo']);//PSEUDO
	$pwd=$_POST['pwd'];//MOT DE PASSE
	$pwd1=$_POST['pwd1'];//CONFIRMATION MOT DE PASSE
	
	if(isset($pseudo)&&isset($pwd)&&isset($pwd1)){
		if ($pwd==$pwd1) {
			if (isset($pseudo)&&($pwd==true) ) {
				$pseudoPresent=0;
				$infoIssues="Le pseudo que vous avez choisie est déjà utilisé. Veuillez en choisir un autre.";

				headBand();
				entry($pseudo,$pwd,$pseudoPresent);
				infoIssues($infoIssues);
			}
		}else{
			$message="Les 2 mots de passes ne sont pas correspondant";

			//headBand();
			msgPWD($message);
				
		}
	}//end of if(isset($lastname)&& isset($firstname)&&	.....
}//end of subscribe

if ($_GET['action']=='logger'){
		$checkPseudo = htmlspecialchars($_POST['checkPseudo']);
		$checkpwd = $_POST['checkpwd'];

		if ( isset($checkPseudo)&& isset($checkpwd) ){
			$noNickName="Aucun pseudo reconnu";
			$NoMatch="Pseudo ou mot de passe incorrect";
			
			checkInfo($checkPseudo,$checkpwd);
			noNickName($noNickName);
			NoMatch($NoMatch);
		}

	}
/*----------------------------LOGIN------------------------------*/

/*-------------------*/

/*------------------------------ADMIN--------------------------*/

if($_GET['action']=='admin'){
	$idMembre=$_SESSION['id'];
	adminPage($idMembre);
	allTopics();	
}
if ($_GET['action']=='selectAvatar') {
	chooseAvatar();
}
if ($_GET['action']=='validAvatar') {
	$idMembre=$_SESSION['id'];
	$idAvatar=$_POST['avatarChoice'];

	changeAvatar($idMembre,$idAvatar);
}
if($_GET['action']=='upGrade'){
	$id_membre=$_GET['id'];
	adminPage();
	upgradeMember($id_membre);
}
if($_GET['action']=='downGrade'){
	$id_membre=$_GET['id'];
	adminPage();
	downGradeMember($id_membre);
}

if ($_GET['action']=='postMovie') {
	if (isset($_FILES['imgFilms']) AND $_FILES['imgFilms']['error'] == 0)
	{
		$title=htmlspecialchars($_POST['title']);
		$releaseDate=$_POST['date'];
		$resume=htmlspecialchars($_POST['tinymce_Movie']);
		$addLink=$_POST['link'];
		$fileName=htmlspecialchars($_POST['newMovie']);
		
		$taillemax=3000000;//environ 3MO
		$extensionValides=array('jpg','jpeg', 'gif','png');

			if ($_FILES['imgFilms']['size']<=$taillemax) {

				$infosfichier = pathinfo($_FILES['imgFilms']['name']);
				$extension_upload = $infosfichier['extension'];
				$resultat=$fileName.".".$extension_upload;
					
					if (in_array($extension_upload, $extensionValides)) {
						move_uploaded_file($_FILES['imgFilms']['tmp_name'], './views/Images/Films/' . basename($_FILES['imgFilms']['name']));
	                    echo "L'envoi a bien été effectué !";
					addNewEntry($title,$resume,$releaseDate,$addLink,$resultat);
					}else{
						$msg="Votre photo n'est pas au bon format.";
					}

			}
			else{
				$msg="Votre image dépasse les 3MO.";
			}
	}

}
if($_GET['action']=='editEntry'){
	$movieEdit=$_GET['id'];
		editEntry($movieEdit);
}
if($_GET['action']=='updateEntry'){
	$movieEdit=$_GET['id'];
	if (isset($_FILES['newimgFilms']) AND $_FILES['newimgFilms']['error'] == 0)
	{
		$newtitle=htmlspecialchars($_POST['newtitle']);
		$newreleaseDate=$_POST['newdate'];
		$newresume=htmlspecialchars($_POST['newtinymce_Movie']);
		$newLink=$_POST['newlink'];
		$newfileName=htmlspecialchars($_POST['editMovie']);
		
		$taillemax=3000000;//environ 3MO
		$extensionValides=array('jpg','jpeg', 'gif','png');
			if ($_FILES['newimgFilms']['size']<=$taillemax) {

				$infosfichier = pathinfo($_FILES['newimgFilms']['name']);
				$extension_upload = $infosfichier['extension'];
				$resultat=$newfileName.".".$extension_upload;
					
					if (in_array($extension_upload, $extensionValides)) {
						move_uploaded_file($_FILES['newimgFilms']['tmp_name'], './views/Images/Films/' . basename($_FILES['newimgFilms']['name']));
					submitEntry($movieEdit,$newtitle,$newresume,$newreleaseDate,$newLink,$resultat);
					}else{
						$msg="Veuillez vérifier le format de la photo.";
					}

			}
			else{
				$msg="Votre image dépasse les 3MO.";
			}
	}

}
if ($_GET['action']=='eraseEntry') {
	$moviedeleted=$_GET['id'];
	deleteMovie($moviedeleted);
}
if ($_GET['action']=='eraseComm') {
	$idSubject=$_GET['id'];
	deleteComm($idSubject);
}
if ($_GET['action']=='confirmComm') {
	$idSubject=$_GET['id'];
	confirmComm($idSubject);
}
/*------------------------END ADMIN-------------------------------*/
if ($_GET['action']=='espace') {
	$idMembre=$_SESSION['id'];
	getInfoUser($idMembre);
}

/*-----------------------------TOPICS-----------------------------*/
if ($_GET['action']=='forum') {
	allTopics();
}
if ($_GET['action']=='newTopic') {
	$auteurTopic=$_SESSION['id'];
	$titreTopic=htmlspecialchars($_POST['titreTopic']);
	$messageTopic=htmlspecialchars($_POST['tinymce_Topic']);
	createdTopic($auteurTopic,$titreTopic,$messageTopic);
}
if ($_GET['action']=='selectTopic') {
	$topic=$_GET['id'];
	selectTopic($topic);
}
if($_GET['action']=='addNewComment'){
	$idTopic=$_GET['id'];
	$idAuteur=$_SESSION['id'];
	$textTopic=htmlspecialchars($_POST['tinymce_Comment']);
		newComment($idTopic,$idAuteur,$textTopic);

}
if ($_GET['action']=='signaler'){
		$idTopic=$_GET['id_topic'];
		$idSubject=$_GET['id'];
		
		WarningComm($idTopic,$idSubject);
}
if ($_GET['action']=='deleteComm'){
	$idSubject=$_GET['id_sujet'];
	deleteComm($idSubject);
}
if ($_GET['action']=='eraseTopic') {
	$idTopic=$_GET['id'];
	deleteTopic($idTopic);
}
/*-----------------------------END TOPICS-------------------------*/
/*----------------------------MEMBERS-----------------------------*/
/*--------------------------END MEMBERS---------------------------*/


if ($_GET['action']=='films') {
		allMovies();
	}	
if ($_GET['action']=='film') {
		oneMovie();
	}

}