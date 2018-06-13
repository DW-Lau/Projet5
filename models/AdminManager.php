<?php
require_once("manager.php");

class membersManager extends Manager
{
	public function checkInfo($checkPseudo,$checkpwd){
		$bdd=$this->dbConnect();
		$req= $bdd->prepare('SELECT id_membre,pwd, status_membre FROM membre WHERE pseudo=:pseudo');
		$req->execute(array(
	   			    'pseudo' => $checkPseudo
	   			));
	
		$resultat = $req->fetch();
		$isPasswordCorrect = password_verify($checkpwd, $resultat['pwd']);

		if (!$resultat){
			
		}
		else{
	    	if ($isPasswordCorrect) {
	    		var_dump($resultat['status_membre']);
	    		$_SESSION['droits']=$resultat['status_membre'];
	        	$_SESSION['id'] = $resultat['id_membre'];
	       		$_SESSION['pseudo'] = $checkPseudo;
	        	echo 'Content de vous revoir '. $_SESSION['pseudo'];
	        	header("Location:./index.php");
	   		}
	   		else{
	   			echo "Une erreur est survenu. Veuilliez ré-essayer.";
	    	}
		}
		return $isPasswordCorrect; 
	}

	public function NewUser($pseudo,$pwd,$pseudoPresent){
		$bdd=$this->dbConnect();
		/*This part will check if the new member had write a pseudo already taken.*/
		$verif=$bdd->prepare('SELECT pseudo FROM membre WHERE pseudo=:pseudo LIMIT 0,1');
		$verif->execute(array(
	   			    'pseudo'=>$pseudo
	   			));
		$resultat=$verif->fetch();

		if($resultat['pseudo']==$pseudo){
				$pseudoPresent=1;
				return $pseudoPresent;
				
		}//end of the verification.
		else{//If all conditions are true, subscribe
				var_dump($pseudo);
				$pass_hache = password_hash($_POST['pwd'], PASSWORD_DEFAULT);

				$user = $bdd->prepare('INSERT INTO membre(pseudo,pwd,date_membre) VALUES(:pseudo,:pwd, Now() )');
				var_dump($pseudo);
				
				$info=$user->execute(array(
						'pseudo'=>$pseudo,
						'pwd'=>$pass_hache
					));

				$membreLogin= $bdd->prepare('SELECT id_membre, status_membre,avatar FROM membre WHERE pseudo=:pseudo ');
				$membreLogin->execute(array(
	   			    'pseudo'=>$pseudo
	   			));
	   			$SessionInfos=$membreLogin->fetch();
	   			$_SESSION['droits']=$SessionInfos['status_membre'];
				$_SESSION["id"]=$SessionInfos["id_membre"];
			 	$_SESSION["pseudo"]=$pseudo;

				 header("Location:./index.php");
		
			}
	}
	public function upGradeRights($id_membre){
		$bdd=$this->dbConnect();
		$id_membre;
		$upGR= $bdd->prepare('UPDATE membre SET status_membre=\'2\' WHERE id_membre= :idmembre');
		$upGR->execute(array(
			'idmembre'=>$id_membre
		));
		header("Location:./index.php?action=admin");
	}
	public function downGradeRights($id_membre){
		$bdd=$this->dbConnect();
		$id_membre;
		$downGR= $bdd->prepare('UPDATE membre SET status_membre=\'1\'WHERE id_membre= :idmembre');
		$downGR->execute(array(
			'idmembre'=>$id_membre
		));
		header("Location:./index.php?action=admin");
	}
	public function listMembers(){
		$bdd=$this->dbConnect();
		$listMmbrs= $bdd->query('SELECT id_membre,pseudo, status_membre FROM membre WHERE status_membre=\'1\'');
		return $listMmbrs;
	}

	public function listModo(){
		$bdd=$this->dbConnect();
		$listMd= $bdd->query('SELECT id_membre,pseudo, status_membre FROM membre WHERE status_membre=\'2 \'');
		return $listMd;
	}
}