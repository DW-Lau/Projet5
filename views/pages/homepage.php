<section>
	<article>
		<div id="diapo">
			<figure id="diapoFirstPage">
				<div id="arrows-L">
					<a href="#", id="chevron-l">
						<i class="fas fa-caret-left"></i>
					</a>
				</div>
									
					<img src="views/Images/Logo_Blender.png" alt="Blender Open movie" id="carrousel" style="height: inherit">
									
				<div id="arrows-R">
					<a href="#" , id="chevron-r"> 
						<i class="fas fa-caret-right"></i>
					</a>
				</div>
								
			</figure>

			<figcaption id="legende"></figcaption>	
			
		</div>
	</article>
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
		 	<?php 
			echo '<img src="views/Images/Films/'. $movie['img_link'].'" alt="'. $movie['img_link'].'" class="FirstPageImg">'; 
			
			?> 
			<div id="presentation">
			<h3>Dernier Film sortie: <?php echo $movie['titre_film']?> </h3>

			<p div="resume_Last_Movie"> Synopsis: <?php echo htmlspecialchars($movie['resume']);?>
				<br> Sortie le : <?php echo htmlspecialchars($movie['date_fr']); ?>
				<br>
				<?php 
			echo 'Visionner le film :<a href="'. $movie['movie_link'].'" target="_blank"> Ici</a>'; 
			
			?> 
				
			</p>
			<?php

				}
				$upDateMovie->closeCursor();
			?>
			</div>
		</div>

		<div id="last_Topic_Out">
			
		</div>
	</div>


</section>
</body>
</html>