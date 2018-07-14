<section id="adminPannel">
	<div id="profil">
		<?php
		while($recapInfo=$userInfo->fetch() ){
		  echo '<img src="views/Images/Avatars/'. $recapInfo['lien_avatar'].'"  class="profilPicture">'
				; 
			}
			$userInfo->closeCursor();	
		?>
		<button class="avatar">
			<a href="./index.php?action=selectAvatar">Séléctionner un avatar</a>
		</button>
	</div>
	<div id="headBandUpDate">
		<div id="listAdminTopics">
			<h2>Modérateur(s) forum:
				<button class="moderateursPlus">
					<i class="fas fa-plus" id="plusModo"></i>

				</button>
				<button class="moderateursMoins"><i class="fas fa-minus" id="minusModo"></i>
				</button>

			</h2>
				<div id="listModo">
					<?php 
						while ($modos=$AllModerateurs->fetch()) {
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
		</div>
		<div id="listMember">
		<h2>Personnes inscrites:
			<button class="membresPlus">
					<i class="fas fa-plus" id="plusMembre"></i>

				</button>
				<button class="membresMoins"><i class="fas fa-minus" id="minusMembre"></i>
				</button>
		</h2>
		<div id="listmembres">
		<?php
		while($listOfMembers=$AllMembers->fetch() ){
				$listOfMembers['status_membre']="Membre";
		
		?>
		<p>Pseudo: <?php echo htmlspecialchars($listOfMembers['pseudo'])?> , status: <?php echo $listOfMembers['status_membre'] ?><br>
			<button id="newModo">
				<a href="./index.php?action=upGrade&amp;id=<?php echo $listOfMembers['id_membre']; ?>">
					<i class="fas fa-user-plus">Passer Modérateur</i>
				</a>
			</button>
		</p>

		<?php
		}
		$AllMembers->closeCursor();
		?>
	</div>
		</div>

		<div id="commentsPannel">
			<h2>Liste des commentaires à vérifier :
				<button class="commsPlus">
					<i class="fas fa-plus" id="plusComm"></i>
				</button>
				<button class="commsMoins">
					<i class="fas fa-minus" id="minusComm"></i>
				</button>
			</h2>
			<div id="listcomments">
			<?php
			while ($getReportedComms=$listWarningComm->fetch() ) {
			?>
			<?php
				if($getReportedComms===0){
					echo "Il n'y a pas de commentaires à gérer";
				}
			?>
			<p class="reported"> <?php echo $getReportedComms['pseudo']?> à écrit le <?php echo $getReportedComms['date_Poste']?> : <?php echo $getReportedComms['message']?> <span class="deleteComm"><a href="./index.php?action=eraseComm&amp;id=<?php echo $getReportedComms['id_sujet']; ?>"> Effacer</a></span>
				<span class="confirmComm" ><a href="./index.php?action=confirmComm&amp;id=<?php echo $getReportedComms['id_sujet']; ?>">Confirmer </a></span></p>
			<?php
			}
			$listWarningComm->closeCursor();
			?>
		</div>
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
							<a href="./index.php?action=eraseEntry&amp;id=<?php echo $listMovies['id_film']; ?>"><button id="deletMovie"> <i class="fas fa-eraser">Effacer de la liste</i></button></a>
						</span>
						<span id="changeButton">
							<a href="./index.php?action=editEntry&amp;id=<?php echo $listMovies['id_film']; ?>"><button id="modifMovie"><i class="fas fa-undo-alt">Modifier</i></button></a>
						</span>

						 <br/>
						</p>
						<?php
							}
							$Movies->closeCursor();
						?>
		</aside>
		<div class="bandeau">
			<!-- decoration -->
		</div>
		<article id="newMovie">
			<h2>Ajouter un film:</h2>

			<form id="getNewMovie" action="./index.php?action=postMovie" method="post" enctype="multipart/form-data">
			<fieldset id="newEntry">		
				<label>Titre du film :<input type="text" name="title" id="title" value="" required/></label>
				<label>Date de sortie<input type="date" name="date" required/></label>
			
				<label> Résumé du film: <textarea class="tinymce" name="tinymce_Movie"></textarea>
				</label>
				<label>Lien du film :<input type="text" name="link" id="link" value="" required/>
				</label>
				<label>Titre du fichier :<input type="text" name="newMovie" id="newMovie"  required/>
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
	<?php
	if(isset($_SESSION['id'])&&$_SESSION['droits']!==1){
		require("./views/pages/newtopic.php");
	}
	?>

</section>
</body>
<script type="text/javascript" src="./views/javascript/adminPannel.js"></script>

</html>