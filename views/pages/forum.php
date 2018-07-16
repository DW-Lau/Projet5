<section id="forumPage">
	<article>
		<h2>Blender Open Movie: le forum</h2>
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
				 echo '<a href="./index.php?action=selectTopic&amp;id='.$listTopic['id_post'].'"><p class="thumbnail_Forum">'. strip_tags($listTopic['message_post']) .'</p></a>';
				 ?>

				<?php 
					if(isset($_SESSION['id'])&&$_SESSION['droits']!==1){
						echo '<button id="eraseTopic"><a href="./index.php?action=eraseTopic&amp;id='. $listTopic['id_post'].'">Supprimer sujet</a></button>';
					}
					?>
				
			</div>
		<?php
			}
			$getTopics->closeCursor();
		?>
		<?php
			if(isset($_SESSION['id'])&&$_SESSION['droits']!==1){
				require("./views/pages/newtopic.php");
			}
		?>
	</article>
</section>
</body>
</html>