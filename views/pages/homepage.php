<section>
	<article id="disclamer">
		<p>
			Site web réalisé dans le cadre de la formation "Developpeur Web Junoir" OpenClassroom. Tous les personnages, films et photos de ce site sont la proprieté de Marvel.<br>
			Mentions et crédits des photos/images sont à retrouver, plus en détails, dans la partie <a href="">"Mentions"</a>
		</p>
	</article>
	<article id="bioBlog">
		
	</article>
	<div id="first_Page_Info">

		<div id="last_Movie_Out">
			<?php
			 while($movie=$LastMovie->fetch() ){
			?>
			<h3>Dernier Film sortie: <?php echo $movie['titre_film']?> </h3>
			<?php
			}
			$LastMovie->closeCursor();
			?>
		</div>

		<div id="last_Topic_Out">
			
		</div>
	</div>


</section>
</body>
</html>