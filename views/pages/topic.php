<section>
	<article id="topic">
		<div class="listAnswer">
			<div class="infoMessageMember">
				<?php
					while($answers=$picked->fetch() ){
				?>
					<?php
							echo '<img src="views/Images/Avatars/'.$answers['lien_avatar'].'" alt="Avatar de '. $answers['pseudo'].'" class="Avatar">';
						?>
					<h3><?php echo $answers['pseudo'];?></h3> 
						à écrit le: <?php echo $answers['date_message']?>, 
						<p class="titreMessage"> <?php echo $answers['titre_post']?></p>
			</div>
				à écrit <?php echo $answers['message_post']?>
				<?php
				}
					$picked->closeCursor();
				?>
			
		</div>
			<?php
				while($pseudoAnswer=$allAnswers->fetch() ){
			?>

			<div class="allAnswers">
				<p class="presentationAnswers">
					<?php
						echo '<img src="views/Images/Avatars/'.$pseudoAnswer['lien_avatar'].'" alt="Avatar de '. $pseudoAnswer['pseudo'].'" class="Avatar">';
					?>
						<?php echo $pseudoAnswer['pseudo']?>, à écrit le <?php echo strip_tags($pseudoAnswer['date_messagePost']);?>
				</p>
					<p class="reponses">
						<?php
							if ($pseudoAnswer['stat_message'] ==1) {
								echo '<span class="attentionRequired"> Vérification du contenu en cours</span>';
							}
						?>
						<?php echo strip_tags($pseudoAnswer['message']);?>
							<a href="./index.php?action=signaler&amp;id=<?php echo $pseudoAnswer['id_sujet']; ?>&amp;id_topic=<?php echo $pseudoAnswer['id_topic']; ?>" title="signaler commentaire">
								<i class="fas fa-exclamation-triangle"></i>
							</a>
					</p>
			</div>
				<?php
					}
					$allAnswers->closeCursor();
				?>
	</article>

	<article id="message">
		<div id="newComment">
			<?php
				if(isset($_SESSION['pseudo']) ){
			?>

			<form id="getNewComment" action="./index.php?action=addNewComment&amp;id=<?php echo $_GET['id']; ?>" method="post">
				<label>Pseudo:<?php echo htmlspecialchars($_SESSION['pseudo']);?>
				</label> 
				<textarea id="tinymce" name="tinymce_Comment"></textarea>
				
				<input type="submit" id="save" value="Valider" />
			</form>
			<?php
			}
			else{
				echo "
				<p id='commentConnect'>Vous devez être connecté pour pouvoir répondre à la communauté. Si vous n'êtes pas encore inscrit <i class='fas fa-arrow-right'> <a href='./index.php?action=connexion'> Inscription</a></i> </p>";
			}
			?>			
		</div> 
	</article>
</section>
</body>
</html>