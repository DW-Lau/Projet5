<section>

	<article id="">
		
		<div class="listAnswer">
			<div class="infoMember">
				<?php
		while($answer=$picked->fetch() ){
			
			?>
				<h3><?php echo $answer['pseudo'];?></h3> 
				à écrit:<h2><?php echo $answer['titre_post']?></h2>
			
				<?php echo $answer['message_post']?>	<?php
		}
		$picked->closeCursor();
		?>
			</div>
		
		</div>
		
			<div>
				<?php
					while($pseudoAnswer=$allAnswers->fetch() ){
				?>
				<p>
				Le <?php echo $pseudoAnswer['date_messagePost']?>, <h3><?php echo $pseudoAnswer['pseudo']?> </h3>à répondu:</p>
			
				<p><?php echo $pseudoAnswer['message']?></p>	<?php
			}
			$allAnswers->closeCursor();
				?>
			</div>
		
		
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
			}else{
				echo "
				<p id='commentConnect'>Vous devez être connecté pour pouvoir répondre à la communauté. Si vous n'êtes pas encore inscrit <i class='fas fa-arrow-right'> <a href='./index.php?action=connexion'> Inscription</a></i> </p>";
			}
			?>
							
		</div> 
	</article>
</section>