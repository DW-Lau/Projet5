<?php
require_once("manager.php");

class CommentsManager extends Manager{

	public function getAllTopics(){
		$bdd=$this->dbConnect();
		$Topics=$bdd->query('SELECT id_post,forum.id_auteur,titre_post,message_post,date_format(date_post,"%d.%m.%y")as date_message, membre.id_membre,pseudo FROM forum INNER JOIN membre ON forum.id_auteur=membre.id_membre');
		
		return $Topics;
	}
	public function oneTopic($topic){
		
		$bdd=$this->dbConnect();
		$sujet=$bdd->prepare(' SELECT id_post,forum.id_auteur,membre.id_membre,pseudo,titre_post,message_post,date_format(date_post,"%d.%m.%y")as date_message
			FROM forum 
 				INNER JOIN membre 
				on forum.id_auteur=membre.id_membre 
			WHERE id_post= :id_post');
		$sujet->execute(array(
			':id_post'=>$topic));
		return $sujet;
	
	}
	public function answerOneTopic($topic){

		$bdd=$this->dbConnect();
		$answer=$bdd->prepare(' SELECT forum.id_post,sujet.id_topic,sujet.id_auteurSujet,membre.id_membre,id_sujet,pseudo,id_topic,message,date_format(date_poste,"%d.%m.%y")as date_messagePost, stat_message
			FROM sujet 
				INNER JOIN forum 
			on forum.id_post=sujet.id_topic 

 				INNER JOIN membre 
				on sujet.id_auteurSujet=membre.id_membre 
			WHERE id_post=:id_post');
		$answer->execute(array(
			':id_post'=>$topic));
		return $answer;
	}
	public function createdTopic($auteurTopic,$titreTopic,$messageTopic){
		$bdd=$this->dbConnect();
		$newTopic=$bdd->prepare('INSERT INTO forum ( id_auteur,titre_post,message_post, date_post) VALUES(:id_auteur,:titre_post,:message_post, NOW() )' );
		$newTopic->execute(array(
			'id_auteur'=>$auteurTopic,
			'titre_post'=>$titreTopic,
			'message_post'=>$messageTopic
			
		));
		$newTopic=$bdd->query('SELECT forum.id_auteur, membre.id_membre FROM forum LEFT JOIN membre ON forum.id_auteur=membre.id_membre');
		//header("Location:index.php?action=admin");
	}
	public function deletTopic($idTopic){
		$bdd=$this->dbConnect();
		$dltTopic=$bdd->query('SELECT id_post, sujet.id_topic FROM forum LEFT JOIN sujet ON forum.id_post=sujet.id_topic');
		$dltTopic=$bdd->prepare('DELETE FROM forum WHERE id_post=?');
		$dltTopic->execute(array($idTopic));
	}
	public function addnewComment($idTopic,$idAuteur,$textTopic){
		$bdd=$this->dbConnect();
		$newComm=$bdd->prepare('INSERT INTO sujet(id_topic,id_auteurSujet,message, date_poste) VALUES(?,?,?, NOW())' );
		$newComm->execute(array(
			$idTopic,
			$idAuteur,
			$textTopic
			));
		//return $newComm;
	}
	public function WarningComment($idTopic,$idSubject){
		$bdd=$this->dbConnect();
		$pbComm=$bdd->prepare('UPDATE sujet SET stat_message=1 WHERE id_sujet=:id_sujet');
		$pbComm->execute(array(
			'id_sujet'=> $idSubject
		));
		// $recupIdChap= $bdd->prepare('SELECT stat_message FROM sujet WHERE id_comm=:id_topic');
		// $recupIdChap->execute(array(
		// 	'id_topic'=> $idTopic
		// ));
		header("Location:index.php?action=selectTopic&id=$idTopic");
	}
}