<section>
	<article id="diaporama">
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

	<div id="first_Page_Info">

		<div id="last_Movie_Out">
			<?php

				 while($movie = $upDateMovie->fetch() ){ 

			?>

			<h3>
				Dernier Film sortie: <?php echo $movie['titre_film']?> 
			</h3>
		 	<div id="resume_Last_Movie"> 
		 	<?php 
				echo '<img src="views/Images/Films/'. $movie['img_link'].'" alt="'. $movie['img_link'].'" class="FirstPageImg">'; 
			?>
<p>
			
				Synopsis: <?php echo htmlspecialchars($movie['resume']);?><br>

				Sortie le : <?php echo htmlspecialchars($movie['date_fr']); ?><br>
			</p>
		</div>
			<div id="presentation">
			

		<?php
			echo '<iframe class="formatVideo" src="'. $movie['movie_link'].'"frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
			?>

				<?php 
			echo '<p>Visionner le film :<a href="'. $movie['movie_link'].'" target="_blank"> Ici</a>'; 
			
			?> 
			
				
			</p>
			<?php

				}
				$upDateMovie->closeCursor();
			?>
			</div>
		</div>
	</div>


</section>
</body>
<script type="text/javascript" src="./views/javascript/diapo.js"></script>
</html>