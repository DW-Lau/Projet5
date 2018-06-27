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
		$sujet=$bdd->prepare(' SELECT forum.id_post,forum.id_auteur,sujet.id_topic,sujet.id_auteurSujet,membre.id_membre,pseudo,titre_post,message_post,date_format(date_post,"%d.%m.%y")as date_message,id_topic,message,date_format(date_poste,"%d.%m.%y")as date_messagePost 
			FROM forum 
				INNER JOIN sujet 
			on forum.id_post=sujet.id_topic 

 				INNER JOIN membre 
				on forum.id_auteur=membre.id_membre 
			WHERE id_post=:id_post');
		$sujet->execute(array(
			':id_post'=>$topic));
		return $sujet;
	
	}
	public function answerOneTopic($topic){

		$bdd=$this->dbConnect();
		$answer=$bdd->prepare(' SELECT forum.id_post,sujet.id_topic,sujet.id_auteurSujet,membre.id_membre,pseudo,id_topic,message,date_format(date_poste,"%d.%m.%y")as date_messagePost 
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
}