<?php
namespace models\members;
use \models\Manager;
require "./vendor/autoload.php";

class MembersManager extends Manager{
	public function checkInfo($checkPseudo,$checkpwd){
		$bdd=parent::dbConnect();
		$req= $bdd->prepare('SELECT id_membre,pwd, status_membre,membre.avatar, avatar.id_avatar, lien_avatar 
					FROM membre 
						LEFT JOIN avatar 
					ON membre.avatar=avatar.id_avatar  
					WHERE pseudo=:pseudo');
		$req->execute(array(
	   			    'pseudo' => $checkPseudo
	   			));
	
		$resultat = $req->fetch();
		$isPasswordCorrect = password_verify($checkpwd, $resultat['pwd']);
			try{
				if (!$resultat){
					$messageErreur="Une erreur est survenue, veuillez vérifier vos informations et recommencer.";
					throw new Exception($messageErreur);
				}else{
			    	if ($isPasswordCorrect) {
			    		$_SESSION['droits']=$resultat['status_membre'];
			        	$_SESSION['id'] = $resultat['id_membre'];
			       		$_SESSION['pseudo'] = $checkPseudo;
			       		$_SESSION['avatar']=$resultat['lien_avatar'];
			        	header("Location:./index.php");
			   		}
			   		else{
			   			$NoMatch="Votre pseudo ou mot de passe est incorrecte.";
			   			throw new Exception($NoMatch);
			    	}
				}
			
		}catch(Exception $e){
			//Will return the "correct" error message"
			require('./views/pages/connexion.php');
		}
	}

	public function NewUser($pseudo,$pwd,$pseudoPresent){
		$bdd=parent::dbConnect();
		/*This part will check if the new member had write a pseudo already taken.*/
		$verif=$bdd->prepare('SELECT pseudo FROM membre WHERE pseudo=:pseudo LIMIT 0,1');
		$verif->execute(array(
	   			    'pseudo'=>$pseudo
	   			));
		$resultat=$verif->fetch();
		try{
			if($resultat['pseudo']==$pseudo){
					
					$pseudoPresent="Le pseudo indiqué est déjà enregistré dans notre base de données, veuillez en selectionner un autre.";
					throw new Exception($pseudoPresent);	
			}//end of the verification.
			else{//If all conditions are true, subscribe
					
					$pass_hache = password_hash($_POST['pwd'], PASSWORD_DEFAULT);

					$user = $bdd->prepare('INSERT INTO membre(pseudo,pwd,date_membre) VALUES(:pseudo,:pwd, Now() )');
			
					
					$info=$user->execute(array(
							'pseudo'=>$pseudo,
							'pwd'=>$pass_hache
						));

					$membreLogin= $bdd->prepare('SELECT id_membre, status_membre,avatar, membre.avatar, avatar.id_avatar, lien_avatar FROM membre LEFT JOIN avatar ON membre.avatar=avatar.id_avatar WHERE pseudo=:pseudo ');
					$membreLogin->execute(array(
		   			    'pseudo'=>$pseudo
		   			));
		   			$SessionInfos=$membreLogin->fetch();
		   			$_SESSION['droits']=$SessionInfos['status_membre'];
					$_SESSION["id"]=$SessionInfos["id_membre"];
				 	$_SESSION["pseudo"]=$pseudo;
					header("Location:./index.php");

				}
			}catch(Exception $e){
				die($e);
			}
	}

	public function getInfo($idMembre){
		$bdd=parent::dbConnect();
		$getAllInfo=$bdd->prepare('SELECT pseudo,status_membre,date_format(date_membre,"%d.%m.%y")as date_membre, avatar, membre.avatar, avatar.id_avatar, lien_avatar FROM membre LEFT JOIN avatar ON membre.avatar=avatar.id_avatar WHERE id_membre =:idmembre');
		$getAllInfo->execute(array(
			':idmembre'=>$idMembre
		));
		return $getAllInfo;
	}

	public function updateInfo($idMembre,$pseudo,$avatar){
		$bdd=parent::dbConnect();
		$updateInfo=$bdd->prepare('SELECT pseudo, avatar, membre.avatar, avatar.id_avatar, lien_avatar FROM membre LEFT JOIN avatar ON membre.avatar=avatar.id_avatar WHERE id_membre =:idmembre');
		$updateInfo->execute(array(
			':idmembre'=>$idMembre
		));
		$updateInfo=$bdd->prepare('UPDATE membre SET pseudo= :pseudo, lien_avatar= :lien WHERE id_membre= :idMembre');
		$updateInfo->execute(array(
			'idmembre'=>$idMembre,
			'pseudo'=>$pseudo,
			'lien'=>$avatar
		));
	}

	public function upGradeRights($id_membre){
		$bdd=parent::dbConnect();
		$id_membre;
		$upGR= $bdd->prepare('UPDATE membre SET status_membre=\'2\' WHERE id_membre= :idmembre');
		$upGR->execute(array(
			'idmembre'=>$id_membre
		));
		header("Location:./index.php?action=admin");
	}

	public function downGradeRights($id_membre){
		$bdd=parent::dbConnect();
		$id_membre;
		$downGR= $bdd->prepare('UPDATE membre SET status_membre=\'1\'WHERE id_membre= :idmembre');
		$downGR->execute(array(
			'idmembre'=>$id_membre
		));
		header("Location:./index.php?action=admin");
	}

	public function listMembers(){
		$bdd=parent::dbConnect();
		$listMmbrs= $bdd->query('SELECT id_membre,pseudo, status_membre FROM membre WHERE status_membre=\'1\'');
		return $listMmbrs;
	}

	public function listModo(){
		$bdd=parent::dbConnect();
		$listMd= $bdd->query('SELECT id_membre,pseudo, status_membre FROM membre WHERE status_membre=\'2 \'');
		return $listMd;
	}

	public function choseAvatar(){
		$bdd=parent::dbConnect();
		$listAvatar=$bdd->query('SELECT * FROM avatar');
		return $listAvatar;
	}

	public function newAvatarProfil($idAvatar,$idMembre){
		$bdd=parent::dbConnect();
		$newPicture=$bdd->prepare('UPDATE membre SET avatar= ? WHERE id_membre= ?');
		$newPicture->execute(array($idAvatar,$idMembre
		));
		$newPicture=$bdd->prepare('SELECT avatar.id_avatar,membre.avatar,membre.id_membre,membre.avatar,avatar.lien_avatar
				FROM avatar 
					INNER JOIN membre 
				ON avatar.id_avatar=membre.avatar
				WHERE id_membre= :idmembre
				');
		$newPicture->execute(array(
			':idmembre'=>$idMembre));
		
		$getnewAvatar=$newPicture->fetch();

		 $_SESSION['avatar']=$getnewAvatar['lien_avatar'];
		header("Location:./index.php");
	}
}