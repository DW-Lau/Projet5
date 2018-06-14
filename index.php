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
	
	adminPage();
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

/*------------------------END ADMIN-------------------------------*/
if ($_GET['action']=='films') {
		allMovies();
	}	
if ($_GET['action']=='film') {
		oneMovie();
	}
	
}