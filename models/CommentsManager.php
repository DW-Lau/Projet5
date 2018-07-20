<?php
namespace models\comments;
require_once("manager.php");

class CommentsManager extends Manager{

	public function getAllTopics(){
		$bdd=$this->dbConnect();
		$Topics=$bdd->query('SELECT id_post,forum.id_auteur, membre.id_membre,membre.avatar,avatar.id_avatar,titre_post,message_post,date_format(date_post,"%d.%m.%y")as date_message,pseudo, lien_avatar
			FROM membre
				INNER JOIN forum 
			ON forum.id_auteur=membre.id_membre
				LEFT JOIN avatar
			ON membre.avatar=avatar.id_avatar');
		return $Topics;
	}
	public function oneTopic($topic){
		
		$bdd=$this->dbConnect();
		$sujet=$bdd->prepare(' SELECT id_post,forum.id_auteur,membre.id_membre,membre.avatar,avatar.id_avatar,pseudo,titre_post,message_post,date_format(date_post,"%d.%m.%y")as date_message,lien_avatar
			FROM forum 
 				INNER JOIN membre 
			on forum.id_auteur=membre.id_membre 
				LEFT JOIN avatar
			ON membre.avatar=avatar.id_avatar

			WHERE id_post= :id_post');
		$sujet->execute(array(
			':id_post'=>$topic));
		return $sujet;
	}

	public function answerOneTopic($topic){

		$bdd=$this->dbConnect();
		$answer=$bdd->prepare(' SELECT forum.id_post,forum.id_auteur,sujet.id_topic,sujet.id_auteurSujet,membre.id_membre,membre.avatar,avatar.id_avatar,id_sujet,pseudo,id_topic,message,date_format(date_poste,"%d.%m.%y")as date_messagePost,date_format(message_post,"%d.%m.%y") as date_message,stat_message,lien_avatar
			FROM forum
				INNER JOIN sujet
			on forum.id_post=sujet.id_topic
				INNER JOIN membre
			on sujet.id_auteurSujet=membre.id_membre
				INNER JOIN avatar
			on membre.avatar=avatar.id_avatar

			WHERE id_topic=:id_topic');
		$answer->execute(array(
			':id_topic'=>$topic));
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
		$newTopic=$bdd->query('SELECT forum.id_auteur, membre.id_membre 
				FROM forum 
					LEFT JOIN membre 
				ON forum.id_auteur=membre.id_membre');
		header("Location:./index.php?action=forum");
	}

	public function deletTopic($idTopic){
		$bdd=$this->dbConnect();
		$dltTopic=$bdd->query('SELECT id_post, sujet.id_topic 
				FROM forum 
					LEFT JOIN sujet
				ON forum.id_post=sujet.id_topic');
		$dltTopic=$bdd->prepare('DELETE FROM forum WHERE id_post=?');
		$dltTopic->execute(array($idTopic));
		header("Location:./index.php?action=forum");
	}

	public function addnewComment($idTopic,$idAuteur,$textTopic){
		$bdd=$this->dbConnect();
		$newComm=$bdd->prepare('INSERT INTO sujet(id_topic,id_auteurSujet,message, date_poste) VALUES(?,?,?, NOW())' );
		$newComm->execute(array($idTopic,$idAuteur,$textTopic));
		header("Location:./index.php?action=selectTopic&id=$idTopic");
		
	}
	public function WarningComment($idTopic,$idSubject){
		$bdd=$this->dbConnect();
		$pbComm=$bdd->prepare('UPDATE sujet SET stat_message=1 WHERE id_sujet=:id_sujet');
		$pbComm->execute(array(
			'id_sujet'=> $idSubject
		));
		header("Location:./index.php?action=selectTopic&id=$idTopic");
	}
	public function listWarningComm(){
		$bdd=$this->dbConnect();
		$listWarning=$bdd->query('SELECT id_sujet,id_topic,sujet.id_auteurSujet,message,date_format(date_poste,"%d.%m.%y")as date_Poste, membre.id_membre, pseudo 
					FROM sujet 
						INNER JOIN membre
					ON sujet.id_auteurSujet=membre.id_membre 
					WHERE stat_message=1');
		return $listWarning;
	}

	public function eraseComment($idSubject){
		$bdd=$this->dbConnect();
		$dltComm=$bdd->prepare('UPDATE sujet SET message="[Message supprimé par les modérateurs]" , stat_message=2 WHERE id_sujet=?');
		$dltComm->execute(array($idSubject));
		header("Location:./index.php");
	}
	public function confirmComment($idSubject){
		$bdd=$this->dbConnect();
		$confComm=$bdd->prepare('UPDATE sujet SET  stat_message=0 WHERE id_sujet=?');
		$confComm->execute(array($idSubject));
		header("Location:./index.php");
	}
}