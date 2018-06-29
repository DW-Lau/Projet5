<section id="adminPannel">
	
	<div id="headBandUpDate">
		<div id="listAdminTopics">
			<h2>Modérateur(s) forum:</h2>
			<?php while ($modos=$AllModerateurs->fetch()) {
			 ?>
			<p>
				Pseudo: <?php echo htmlspecialchars($modos['pseudo'])?> <br>
				<button id="dwnDroit"><a href="./index.php?action=downGrade&amp;id=<?php echo $modos['id_membre']; ?>"><i class="fas fa-user-minus">Retire ce modérateur.</i></a></button>
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
			<button id="newModo"><a href="./index.php?action=upGrade&amp;id=<?php echo $listOfMembers['id_membre']; ?>"><i class="fas fa-user-plus">Passer Modérateur</i></button>
				<button id="ban"> <a href="./index.php?action=ban&amp;id=<?php echo $listOfMembers['id_membre']; ?>"><i class="fas fa-user-alt-slash">Bannir </i></a></button>
		</p>

		<?php
		}
		$AllMembers->closeCursor();
		?>
		</div>

		<div id="commentsPannel">
			<h2>Liste des commentaires à vérifier : </h2>
			<?php
			while ($getReportedComms=$listWarningComm->fetch() ) {
			?>
			<p class="reported"> <?php echo $getReportedComms['pseudo']?> à écrit le <?php echo $getReportedComms['date_Poste']?> : <?php echo $getReportedComms['message']?> <span class="deleteComm"><a href="./index.php?action=eraseComm&amp;id=<?php echo $getReportedComms['id_sujet']; ?>"> Effacer commentaire</a></span>
				<span class="confirmComm" ><a href="./index.php?action=confirmComm&amp;id=<?php echo $getReportedComms['id_sujet']; ?>">Confirmer Commentaire</a></span></p>
			<?php
			}
			$listWarningComm->closeCursor();
			?>
		</div>
		
	</div>

	<div id="controlleAdmin">
		<aside id="EntryAdmin">
				<h2> Liste des films:</h2>
					<?php
						while ($listMovies=$Movies->fetch() ) {
					?>
					<p class="warning">
						<i class="fas fa-film"></i> <?php echo $listMovies['titre_film']?>
						</br>
						<span id="deleteEntry">
							<button id="deletMovie"><a href="./index.php?action=eraseEntry&amp;id=<?php echo $listMovies['id_film']; ?>"> <i class="fas fa-eraser">Effacer de la liste</i></a></button>
						</span>
						<span id="changeButton">
							<button id="modifMovie"><a href="./index.php?action=editEntry&amp;id=<?php echo $listMovies['id_film']; ?>"><i class="fas fa-undo-alt">Modifier</i></a></button>
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
		<article id="newMovie">
			<h2>Ajouter un film:</h2>

			<form id="getNewMovie" action="./index.php?action=postMovie" method="post" enctype="multipart/form-data">
			<fieldset>		
				<label>Titre du film :<input type="text" name="title" id="title" value="" required/></label>
				<label>Date de sortie<input type="date" name="date"></label>
			
				<label> Résumé du film: <textarea class="tinymce" name="tinymce_Movie"></textarea>
				</label>
				<label>Lien du film :<input type="text" name="link" id="link" value="" required/>
				</label>
				<label>Titre du fichier (max. 50 caractères) :<input type="text" name="newMovie" id="newMovie"  required/>
				</label><span id="warningTitle"></span>
				<label>Fichier ('jpg','jpeg', 'gif' et 'png' | max. 3 Mo) :
     				<input type="file" name="imgFilms" id="imgFilms" required/>
   				</label>
				<input type="submit" id="send" value="Publier" />
			</fieldset>
			</form>
			
		</article>
<!-- New topic is call by "Back.php" -->
	</div>

</section>
</body>
<script type="text/javascript" src="./views/javascript/adminPannel.js"></script>