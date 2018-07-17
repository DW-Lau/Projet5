<section>
	<div id="presentationsFilms">
		<article id="IntroMovies">
			<h3>Open Movies: Blender Fondation</h3>
			<p> Liste complète des films réalisés par la <a href="https://www.blender.org/about/projects/"> fondation Blender</a>
			</p>
		</article>

		<article id="Thumbnails">
			<?php
				while ($allMovies=$Movies->fetch() ) {
			?>
				<figure class="thumbnais_Movie">
					<?php 
						echo '<a href="./index.php?action=film&amp;id='. $allMovies['id_film'] .'">
							<img src="views/Images/Films/'. $allMovies['img_link'].'" alt="'. $allMovies['img_link'].'"></a>';
					?> 
						<figcaption> 
							<h4> <?php echo $allMovies['titre_film']?> </h4>
								<p><?php echo htmlentities($allMovies['resume']);?> [...]</p>
						</figcaption>
				</figure>
			<?php
			}
			$Movies-> closeCursor();
			?>
		</article>
	</div>
</section>
</body>
</html>