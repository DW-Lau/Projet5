<section>
	<article id="disclamer">
		<p>
			Site web réalisé dans le cadre de la formation "Developpeur Web Junoir" OpenClassroom. Tous les personnages, films et photos de ce site sont la proprieté de Blender.<br>
			Mentions et crédits des photos/images sont à retrouver, plus en détails, dans la partie <a href="">"Mentions"</a>
		</p>
	</article>
	<article id="bioBlog">
		
	</article>
	<div id="first_Page_Info">

		<div id="last_Movie_Out">
			<?php

				 while($movie = $upDateMovie->fetch() ){ 

			?>
		<!-- 	<?php 
			//echo '<img src="views/Images/Films/'. $movie['img_link'].'" alt="Dernier film de la fondation Blender">'; 
			//var_dump($movie['img_link']);
			?> -->
			<h3>Dernier Film sortie: <?php echo $movie['titre_film']?> </h3>

			<p div="resume_Last_Movie"> Synopsis: <?php echo htmlspecialchars($movie['resume']);?>
				<br> Sortie le : <?php echo htmlspecialchars($movie['date_fr']); ?>
				<br>
			<!-- 	<?php 
			//echo 'Visionner le film :<a href="'. $movie['movie_link'].'"></a>"'; 
			//var_dump($movie['img_link']);
			?> -->
				
			</p>
			<?php

				}
				$upDateMovie->closeCursor();
			?>
		</div>

		<div id="last_Topic_Out">
			
		</div>
	</div>


</section>
</body>
</html>