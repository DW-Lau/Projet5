<section>
	<div id="">	
		<article id="rules">
			<h4 class="subInfo">Avant de continuer..</h4>
				<p> Remplissez le formulaire  pour rejoindre notre communautée! </br>
					Devenez membre et profiter de  nouveau contenus.
					Paratger vos impressions sur <a href="https://www.blender.org/about/projects/"> les films Open Movies de la fondation Blender</a>, avec les autres utilisateurs, en postant dans les différents topics du forum.  </br></br>

					<i>En remplissant, et acceptant l'envoi du formulaire vous acceptez l'utilisation des cookies.</br>
					Les informations renseignées ne seront utilisées que sur ce site.
				</p>
				<p id="mentions">Projet réalisé dans le cadre de la formation OpenClassroom: Développeur Web Junior.Projet 5: "Réaliser un projet personnel".</p></i>
		</article>

		<div id="subBlock">

			<div class="formulaires">
				<h3>Inscription:</h3>
					<form method="post" action="./index.php?action=subscribeMember">
						
						<label name="pseudo"> Pseudo:<input type="text" name="pseudo" id="pseudo" required></label>
								

						<!-- <label name="mail"> Adresse mail:<input type="email" name="mail" id="mail" required/></label>
								<span id="mailcheck"></span> -->

						<label name="pwd">Mot de passe:<input type="password" name="pwd" id="motDpasse" required /></label>
								<span id="longueurpwd"></span>

						<label name="pwd1">Confirmation du mot de passe:<input type="password" name="pwd1" id="pwd1" required /></label>

						<input type="submit" id="valide" value="Valider" />
					</form>
					<?php
					if (isset($pseudoPresent)) {
						echo "<p> Pseudo déjà utilisé, veuillez en séléctionner un autre.</p>";
					}
					if (isset($message)) {
						echo "<p class='warning_Info'>" .$message ."</p>";
					}
					if(isset($infoIssues)){
						echo "<p class='warning_Info'>" .$infoIssues."</p>";
					}
					?>
			</div>

			<div class="formulaires">
				<h3>Connexion: </h3>
					<form method="post" action="./index.php?action=logger">
						<label name="checkPseudo"> Pseudo:<input type="text" name="checkPseudo" id="pseudoMember" required></label>
						<label name="checkpwd">Mot de passe:<input type="password" name="checkpwd" id="motDpasseMember" required /></label>
						<input type="submit" id="validation" value="Valider" />
					
					</form>
						<?php
						if (isset($noNickName)) {
							echo "<p>".$noNickName."</p>";
						}
						if(isset($NoMatch)){
							echo "<p>".$NoMatch."</p>";
						}
						?>
			</div>
		</div> <!-- end of subBlock -->
	</div><!--end secondSideDeco-->
	
</section>

</body>
</html>