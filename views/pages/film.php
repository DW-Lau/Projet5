<section>
	<article id="OneMovie">
		<?php
		while ( $movie=$selectedMovie->fetch() ) {
		?>
		
		<h2> <?php echo htmlspecialchars($movie['titre_film'])?></h2>
		<div id="moviePage">
			<p class="presentation">
		<?php 
			echo '<img src="views/Images/Films/'. $movie['img_link'].'" alt="'. $movie['img_link'].'" id="imgPoster"'; 
		?> 
		
			<i>
				<?php echo htmlspecialchars($movie['titre_film'])?> est sortie en:  <?php echo htmlspecialchars($movie['date_fr'])?>.</br>
			</i>
			<?php echo htmlspecialchars_decode($movie['resume'])?>
			
		</p>
		</div>
		<?php
			echo '<iframe width="560" height="315" src="'. $movie['movie_link'].'"frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
			<p id="warningVideo">Si votre navigateur n\'affiche pas la vidéo, cliquez <a href="'. $movie['movie_link'].'"target="_blank">ICI</a></p>';
			?>
			
		<?php 
		}
		$selectedMovie-> closeCursor();
		?>

</article>
</section>
</body>
</html>