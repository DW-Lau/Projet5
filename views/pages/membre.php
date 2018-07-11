<section>
	<article id="espaceMembre">
		<?php 
		while($recapInfo=$userInfo->fetch() ){
			?>
		<div id="infoPerso">
			<?php 
				echo '<img src="views/Images/Avatars/'. $recapInfo['lien_avatar'].'"  class="profilPicture">'
				; 
				?>
				<p>Bonjour <?php echo $recapInfo['pseudo']?></p>
				
		</div>
		<a href="./index.php?action=selectAvatar">
			<button class="avatar">Séléctionner un avatar</button>
		</a>
				
		<div>
		<?php
		if ($recapInfo['status_membre']==1) {
			$recapInfo['status_membre']="Membre du site";
			echo '<p>Vous êtes '. $recapInfo['status_membre'].'</p>';
		}
		elseif($recapInfo['status_membre']==2){
			$recapInfo['status_membre']="Modérateur du forum";
			echo '<p>Vous êtes '. $recapInfo['status_membre'].'</p>';
		}
			?>
		
		
			<p>Vous êtes inscrit depuis le :<?php echo $recapInfo['date_membre']?></p>
		
		</div>
		<?php
	}
	$userInfo->closeCursor();
	?>
	</article>

	<article>
		<h2>Liste</h2>
			<?php
			while ($getReportedComms=$listWarningComm->fetch() ) {
			?>
			<p class="reported"> 
				<?php echo $getReportedComms['pseudo']?> à écrit le <?php echo $getReportedComms['date_Poste']?> : <?php echo $getReportedComms['message']?>
				<span class="deleteComm">
					<a href="./index.php?action=eraseComm&amp;id=<?php echo $getReportedComms['id_sujet']; ?>"> Effacer </a>
				</span>
				<span class="confirmComm" >
					<a href="./index.php?action=confirmComm&amp;id=<?php echo $getReportedComms['id_sujet']; ?>">Confirmer </a>
				</span>
			</p>
			<?php
			}
			$listWarningComm->closeCursor();
			?>
	</article>
</section>