<section>
	<article id="icones">
		<h2>Galerie d'avatars</h2>
		<p id="infoSelection">Pour choisir votre avatar veuillez cliquez sur l'image.</p>
		<div id="galerie">
			<?php
				while($listAvatar=$pickAvatar->fetch() ){
				echo '<figure>
						<a href="./index.php?action=newAvatar&amp;id_pict='.$listAvatar['id_avatar'].'">
							<img src="views/Images/Avatars/'.$listAvatar['lien_avatar'].'" alt="Avatar '.$listAvatar['lien_avatar'].'" class="imageAvatar">
						</a>
					  </figure>';
			}
			$pickAvatar->closeCursor();
			?>
		</div>

	</article>
</section>

</body>
</html>