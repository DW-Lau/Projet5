<section id="forumPage">
	<article id="forum">
		<h2>Blender Open Movie: le forum</h2>
		<?php
			while($listTopic = $getTopics->fetch()){
		?>
			<div class="infoMember">
				<?php
				echo '<img src="views/Images/Avatars/'.$listTopic['lien_avatar'].'" alt="Avatar de '. $listTopic['pseudo'].'" class="Avatar">';
				?>
				<?php echo $listTopic['pseudo']?> à écrit: le <?php echo htmlentities($listTopic['date_message']);?>
			</div>

			<div class="message">
				<?php
				 echo '<a href="./index.php?action=selectTopic&amp;id='.$listTopic['id_post'].'"><p class="thumbnail_Forum">'. htmlentities($listTopic['message_post']) .'</p></a>';
				 ?>

				<?php 
					if(isset($_SESSION['id'])&&$_SESSION['droits']!=1){
						echo '<span id="eraseTopic"><a href="./index.php?action=eraseTopic&amp;id='. $listTopic['id_post'].'">Supprimer sujet</a></span>';
					}
					?>
				
			</div>
		<?php
			}
			$getTopics->closeCursor();
		?>
		<?php
			if(isset($_SESSION['id'])&&$_SESSION['droits']!=1){
				require("./views/pages/newtopic.php");
			}
		?>
	</article>
</section>
</body>
</html>