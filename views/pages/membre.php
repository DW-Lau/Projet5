<section>
	<article>
		<?php 
		while($recapInfo=$userInfo->fetch() ){
			?>
		<div id="infoPerso">
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
			<form id="changeInfo" action="./index.php?action=infoEspaceMembre" method="post" enctype="multipart/form-data">
					
				<?php
				echo '<label>Votre pseudo :<input type="text" name="newPseudo" id="pseudo" value="'.$recapInfo['pseudo'].'" required/></label>AJOUTER UN MESSAGE DE PR2VENTIONS';
				?>
				<label>Votre avatar:
				<?php 
				echo '<img src="views/Images/Avatars/'. $recapInfo['lien_avatar'].'" alt="'. $recapInfo['lien_avatar'].'" class="FirstPageImg">'; 
				?> 
     				<input type="file" name="imgFilms" id="imgFilms" required/>
   				</label>
				<input type="submit" id="confirmation" value="Confirmer les modifications" />
			
			</form>
		</div>
		<?php
	}
	$userInfo->closeCursor();
	?>
	</article>

</section>