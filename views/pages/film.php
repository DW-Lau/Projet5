<section>
	<article id="OneMovie">
		<?php
		while ( $movie=$selectedMovie->fetch() ) {
		?>
		<h2> <?php echo htmlspecialchars($movie['titre_film'])?></h2>
		<?php 
			echo '<img src="views/Images/Films/'. $movie['img_link'].'" alt="'. $movie['img_link'].'"'; 
		?> 
		<p>
			<?php echo htmlspecialchars($movie['resume'])?>
			
		</p>

		<?php 
		
			echo '<video src="'. $movie['movie_link'].'" width="600" alt="'. $movie['titre_film'].'"></video>';
			?>
			<p>Si votre navigateur n'affiche pas la vidéo, cliquez <a href="'. $movie['movie_link'].'">ICI</a></p>
		<?php 
		}
		$selectedMovie-> closeCursor();
		?>
	</article>

</section>