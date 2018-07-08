<section>
	<article>
	<h2>Forum:titre temporaire</h2>
	<?php
		while($listTopic = $getTopics->fetch()){
	?>
	<div class="infoMember">
		<?php
		echo '<img src="views/Images/Avatars/'.$listTopic['lien_avatar'].'" alt="Avatar de '. $listTopic['pseudo'].'" class="Avatar">';
		
			?>
		<?php echo $listTopic['pseudo']?> à écrit: le <?php echo $listTopic['date_message']?>
	</div>
	<div class="message">
		<?php
		 echo '<a href="./index.php?action=selectTopic&amp;id='.$listTopic['id_post'].'"><p class="thumbnail_Forum">'.$listTopic['message_post'].'</p></a>';
		 ?>
		<?php echo count($listTopic['message_post']);?>
		
		<?php if(isset($_SESSION['id'])&&$_SESSION['droits']!==1){
				echo '<button id="eraseTopic"><a href="./index.php?action=eraseTopic&amp;id='. $listTopic['id_post'].'">Supprimer sujet</a></button>';
			}
			?>
		
	</div>
	<?php
	}
	$getTopics->closeCursor();
	?>
	</article>
</section>