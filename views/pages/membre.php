<section>
	<article>
		<?php 
		while($recapInfo=$userInfo->fetch() ){
			?>
		<div id="infoPerso">
			<?php 
				echo '<img src="views/Images/Avatars/'. $recapInfo['lien_avatar'].'"  class="FirstPageImg">'; 
				?>
				<p>Bonjour <?php echo $recapInfo['pseudo']?></p>
		</div>

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
		<h2> Liste des commentaires à vérifier: </h2>
		<?php
		while($listResult=$listWarningComm->fetch() ){
		?>
		<p><?php echo $listResult['message']?></p>
		<?php
		}
	$listWarningComm->closeCursor();
			?>
	</article>
</section>