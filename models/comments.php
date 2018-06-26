<?php
require_once("manager.php");

class CommentsManager extends Manager{

	public function getAllTopics(){
		$bdd=$this->dbConnect();
		$Topics=$bdd->query('SELECT id_post,forum.id_auteur,titre_post,message_post,date_format(date_post,"%d.%m.%y")as date_message, membre.id_membre,pseudo FROM forum LEFT JOIN membre ON forum.id_auteur=membre.id_membre');
		
		return $Topics;
	}
	public function oneTopic($topic){
		var_dump($topic);
		$bdd=$this->dbConnect();
		$sujet=$bdd->prepare('SELECT forum.id_post,sujet.id_topic,id_auteur,titre_post,message_post,date_format(date_post,"%d.%m.%y")as date_message,id_topic,id_auteurSujet,message,date_format(date_poste,"%d.%m.%y")as date_messagePost FROM forum INNER JOIN sujet on forum.id_post=sujet.id_topic WHERE id_post=:id_post');
		$sujet->execute(array(
			':id_post'=>$topic));
		return $sujet;
	
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