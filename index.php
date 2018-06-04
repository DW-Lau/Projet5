<?php
session_start();

if (!(isset($_GET['action']) ) ) {
	require("controller/Front.php");
	//	headBand();
		//getAllChaps();	
}

if (isset($_GET['action'])){

	if($_GET['action']=='logOut'){//log ou session
		session_destroy();
		header("Location:index.php");
	}

/*--------------------------------LOGIN / SUBSCRIBE----------------------------------------*/
if($_GET['action']=='connexion'){
	require("controller/Front.php");
	require ("controller/Back.php");
	 	headBand();
	 	formulaire();
}
	if ($_GET['action']=='subscribeMember') {
		$pseudo = htmlspecialchars($_POST['pseudo']);//PSEUDO
		$mdp=$_POST['mdp'];//MOT DE PASSE
		$mdp1=$_POST['mdp1'];//CONFIRMATION MOT DE PASSE
		$mail = $_POST['mail'];//ADRESSE MAIL

		if(isset($pseudo)&&isset($mdp)&&isset($mdp1)&&isset($mail)){
			if ($mdp==$mdp1) {
				if ( preg_match ("#^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail']) ) {
					if (isset($pseudo)&&($mdp==true)&&($mail== true) ) {
						$pseudoPresent=0;
							require ("controller/Front.php");
							require ("controller/Back.php");
						//	headBand();
							//subscribe($lastname,$firstname,$pseudo,$mdp,$mail,$pseudoPresent);
					//	$infoIssues="Le pseudo que vous avez choisie est déjà utilisé. Veuillez en choisir un autre.";
						//	infoIssues($infoIssues);
					}
				}else{
			//	$message="Une erreur dans votre adresse mail s'est produit. Veuillez vérifier vos information";
				require ("controller/Front.php");
				require ("controller/Back.php");
				//headBand();
				//msgMail($message);
				}
			}else{
			//	$message="Les 2 mots de passes ne sont pas correspondant";
				require ("controller/Front.php");
				require ("controller/Back.php");
				//headBand();
				//msgPWD($message);
				
			}
		}//end of if(isset($lastname)&& isset($firstname)&&	.....
			
	}