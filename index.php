<?php
session_start();

require "vendor/autoload.php";
require("controllers/Front.php");
require ("controllers/Back.php");
try{
if(isset($_SESSION['id'])){
	if ((time()-$_SESSION['time_log'])>120 ) {//essaie de 2 minutes sinon 600
		session_destroy();
		$messageLogOut="<section> <p>Oups vous êtes resté inactif trop longtemps: <a href='index.php'>Accueil</a><//p></section>";
		throw new Exception($messageLogOut);
	}
}else{
	$_SESSION['time_log']=time();
}
}catch(Exception $e){
	headBand();
	die($messageLogOut);
	header("Location:index.php");
}

if(!isset($_GET['action'])){
	headBand();
	firstPageInfo();
}
if (isset($_GET['action']))
{
	headBand();
	try{
		if($_GET['action']=='logOut'){
			session_destroy();
			header("Location:index.php");
		}

		/*--------------------------------LOGIN / SUBSCRIBE----------------------------------------*/
		elseif($_GET['action']=='connexion'){
			 	formulaire();
		}
		elseif ($_GET['action']=='subscribeMember') {
			$pseudo = htmlspecialchars($_POST['pseudo']);//PSEUDO
			$pwd=$_POST['pwd'];//MOT DE PASSE
			$pwd1=$_POST['pwd1'];//CONFIRMATION MOT DE PASSE
			
			if(isset($pseudo)&&isset($pwd)&&isset($pwd1)){
				try{
					if ($pwd==$pwd1) {
						if (isset($pseudo)&&($pwd==true) ) {
							$pseudoPresent=0;
							
							entry($pseudo,$pwd,$pseudoPresent);
							
							$messagePseudo="Le pseudo que vous avez choisie est déjà utilisé. Veuillez en choisir un autre.";
							throw new Exception($messagePseudo);
						}
					}else{
						$messageMDP="Les 2 mots de passes ne sont pas correspondant";
						throw new Exception($messageMDP);	
					}
				}catch(Exception $e){
					require ("views/pages/connexion.php");
				}//end catch
			}//end of 
		}//end of subscribe

		elseif ($_GET['action']=='logger'){
				$checkPseudo = htmlspecialchars($_POST['checkPseudo']);
				$checkpwd = $_POST['checkpwd'];

				if ( isset($checkPseudo)&& isset($checkpwd) ){
					
					$NoMatch="Pseudo ou mot de passe incorrect";
					
					checkInfo($checkPseudo,$checkpwd);
					 NoMatch($NoMatch);
				}

			}
		/*----------------------------LOGIN------------------------------*/

		/*------------------------------ADMIN--------------------------*/

		elseif($_GET['action']=='admin'){
			try{
				if (!isset($_SESSION['id'])) {
					$MessageAdmin="Vous devez être connecté pour avoir accès à cette page.";
					throw new Exception("$MessageAdmin");

				}else{
					$idMembre=$_SESSION['id'];
					adminPage($idMembre);
				}
			}catch(Exception $e){
				die ("<section><p>".$MessageAdmin."</p></section>");
			}
			
		}
		elseif ($_GET['action']=='selectAvatar') {
			chooseAvatar();
		}
		elseif($_GET['action']=='newAvatar'){
			$idAvatar=$_GET['id_pict'];
			$idMembre=$_SESSION['id'];
			getNewAvatar($idAvatar,$idMembre);

		}
		elseif($_GET['action']=='validAvatar') {
			$idMembre=$_SESSION['id'];
			$idAvatar=$_POST['avatarChoice'];

			changeAvatar($idMembre,$idAvatar);
		}
		elseif($_GET['action']=='upGrade'){
			$id_membre=$_GET['id'];
			adminPage();
			upgradeMember($id_membre);
		}
		elseif($_GET['action']=='downGrade'){
			$id_membre=$_GET['id'];
			adminPage();
			downGradeMember($id_membre);
		}

		elseif ($_GET['action']=='postMovie') {
			if (isset($_FILES['imgFilms']) AND $_FILES['imgFilms']['error'] == 0){
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

		elseif($_GET['action']=='editEntry'){
			$movieEdit=$_GET['id'];
				editEntry($movieEdit);
		}
		elseif($_GET['action']=='updateEntry'){
			$movieEdit=$_GET['id'];

			if (isset($_FILES['newimgFilms']) AND $_FILES['newimgFilms']['error'] == 0){
				$newtitle=htmlspecialchars($_POST['newtitle']);
				$newreleaseDate=$_POST['newdate'];
				$newresume=strip_tags($_POST['newtinymce_Movie']);
				$newLink=$_POST['newlink'];
				$newfileName=htmlspecialchars($_POST['editMovie']);
				
				$taillemax=3000000;//environ 3MO
				$extensionValides=array('jpg','jpeg', 'gif','png');
				try{
					if ($_FILES['newimgFilms']['size']<=$taillemax) {

						$infosfichier = pathinfo($_FILES['newimgFilms']['name']);
						$extension_upload = $infosfichier['extension'];
						$resultat=$newfileName.".".$extension_upload;
							
							if (in_array($extension_upload, $extensionValides)) {
								move_uploaded_file($_FILES['newimgFilms']['tmp_name'], './views/Images/Films/' . basename($_FILES['newimgFilms']['name']));
							submitEntry($movieEdit,$newtitle,$newresume,$newreleaseDate,$newLink,$resultat);
							}else{
								$msg="<p>Veuillez vérifier le format de la photo.</p>";
								throw new Exception($msg);
								
							}
					}
					else{
						$msgTaille="<p>Votre image dépasse les 3MO.</p>";
						throw new Exception($msgTaille);
						
					}
				}catch(Exception $e){
					require('views/pages/adminPage.php');
					die($e);
				}
			}
		}

		elseif ($_GET['action']=='eraseEntry') {
			$moviedeleted=$_GET['id'];
			deleteMovie($moviedeleted);
		}

		elseif($_GET['action']=='eraseComm') {
			$idSubject=$_GET['id'];
			deleteComm($idSubject);
		}

		elseif ($_GET['action']=='confirmComm') {
			$idSubject=$_GET['id'];
			confirmComm($idSubject);
		}

		/*------------------------END ADMIN-------------------------------*/
		/*----------------------------PROFIL------------------------------*/
		elseif ($_GET['action']=='espace') {
			try{
				if (!isset($_SESSION['id'])) {
					throw new Exception("<section><p>Vous devez être connecté pour avoir accès à cette page.</p></section>");

				}else{
					$idMembre=$_SESSION['id'];
					getInfoUser($idMembre);
				}
			}catch(Exception $e){
				die ($e);
			}
		}

		/*-----------------------------TOPICS-----------------------------*/
		elseif ($_GET['action']=='forum') {
			allTopics();
		}
		elseif ($_GET['action']=='newTopic') {
				try{
				if (!isset($_SESSION['id'])) {
					$messageConnexion="Vous devez être connecté pour avoir accès à cette page.";
					throw new Exception($messageConnexion);

				}else{
					$auteurTopic=$_SESSION['id'];
					$titreTopic=strip_tags($_POST['titreTopic']);
					$messageTopic=strip_tags($_POST['tinymce_Topic']);
					createdTopic($auteurTopic,$titreTopic,$messageTopic);
				}
			}catch(Exception $e){
				die ("<section><p>".$messageConnexion."</p></section>");
			}
		}
		elseif ($_GET['action']=='selectTopic') {
			$topic=$_GET['id'];
			selectTopic($topic);
		}
		elseif($_GET['action']=='addNewComment'){
			try{
				if (!isset($_SESSION['id'])) {
					$messageConnexion="Vous devez être connecté pour avoir accès à cette page.";
					throw new Exception($messageConnexion);

				}else{
					$idTopic=$_GET['id'];
					$idAuteur=$_SESSION['id'];
					$textTopic=strip_tags($_POST['tinymce_Comment']);
					newComment($idTopic,$idAuteur,$textTopic);
				}
			}catch(Exception $e){
				die ("<section><p>".$messageConnexion."</p></section>");
			}
		}

		elseif ($_GET['action']=='signaler'){
			try{
				if (!isset($_SESSION['id'])) {
					$warningComment="Seul les membre du forum peuvent signaler du contenu<br />Connecter vous ou inscrivez vous sur le site pour participer à la vie du forum.";
					throw new Exception($warningComment);

				}else{
					$idTopic=$_GET['id_topic'];
					$idSubject=$_GET['id'];
					WarningComm($idTopic,$idSubject);
				}
			}catch(Exception $e){
				die ("<section><p>".$warningComment."</p></section>");
			}
		}

		elseif($_GET['action']=='deleteComm'){
			$idSubject=$_GET['id_sujet'];
			deleteComm($idSubject);
		}

		elseif ($_GET['action']=='eraseTopic') {
			$idTopic=$_GET['id'];
			deleteTopic($idTopic);
		}
		/*-----------------------------END TOPICS-------------------------*/
		elseif ($_GET['action']=='films') {
				allMovies();
			}	
		elseif ($_GET['action']=='film') {
				oneMovie();
			}
		
		else{
			throw new Exception("");
		}

	}catch(Exception $e ){
			require('views/pages/erreur.php');
			
		}
}//end of if action