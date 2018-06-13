<section id="adminPannel">
	
	<div id="headBandUpDate">
		<div id="listAdminTopics">
			<h2>Modérateur(s) forum:</h2>
			<?php while ($modos=$AllModerateurs->fetch()) {
			 ?>
			<p>
				Pseudo: <?php echo htmlspecialchars($modos['pseudo'])?> <br>
				<a href="./index.php?action=downGrade&amp;id=<?php echo $modos['id_membre']; ?>"><i class="fas fa-user-minus">Retire ce modérateur.</i></a>
			</p>
			<?php
			}
			$AllModerateurs->closeCursor();
			?>
			
		</div>
		<div id="listMember">
		<h2>Personnes inscrites:</h2>
		<?php
		while($listOfMembers=$AllMembers->fetch() ){
				$listOfMembers['status_membre']="Membre";
		
		?>
		<p>Pseudo: <?php echo htmlspecialchars($listOfMembers['pseudo'])?> , status: <?php echo $listOfMembers['status_membre'] ?><br>
			<a href="./index.php?action=upGrade&amp;id=<?php echo $listOfMembers['id_membre']; ?>"><i class="fas fa-user-plus">Passer Modérateur</i></a> <a href="./index.php?action=ban&amp;id=<?php echo $listOfMembers['id_membre']; ?>"><i class="fas fa-user-alt-slash">Bannir </i></a>
		</p>

		<?php
		}
		$AllMembers->closeCursor();
		?>
		</div>

		<div id="lastTopicUpdate">
			
		</div>
		<div id="lastSubjectUpdate">
			
		</div>
	</div>

	<div id="controlleAdmin">
		<aside id="EntryAdmin">
				<h2> Liste des films:</h2>
					<?php
						while ($listMovies=$Movies->fetch() ) {
					?>
					<p class="warning">
						<?php echo $listMovies['titre_film']?>
						</br>
						<span id="deleteEntry">
							<a href="./index.php?action=eraseEntry&amp;id=<?php echo $listMovies['id_film']; ?>"> <i class="fas fa-eraser">Effacer de la liste</i></a>
						</span>
						<span id="changeButton">
							<a href="./index.php?action=editEntry&amp;id=<?php echo $listMovies['id_film']; ?>"><i class="fas fa-undo-alt">

Modifier</i></a>
						</span>

						 <br/>
						</p>
						<?php
							}
							$Movies->closeCursor();
						?>
		</aside>
		<aside id="messagesPannel">
			
		</aside>
		<article>
			<h2>Ajouter un film:</h2>

			<form id="getNewMovie" action="./index.php?action=postMovie" method="post">
					
				<label>Titre:<input type="text" name="title" id="title" value="" required/></label>
					
				<textarea class="tinymce" name="tinymce_Movie"></textarea>
					
				<input type="submit" id="send" value="Publier" />
			</form>
			
		</article>

	</div>

</section>