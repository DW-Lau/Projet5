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

	<div id="first_Page_Info">

		<div id="last_Movie_Out">

			<p id="disclamerParagraphes">
				C'est en 2005 que débutait l'aventure de la fondation Blender Open Movie.<br />
				Publiés sous le registre des creatives communs, les animations et films créés par  la fondation et les artistes enrôlés pour ces projets ont laissé parler leurs savoir-faire et la puissance de leur logiciel Blender , à l'occasion de ces cours métrages.<br />
				Au cours de ces 12 dernières années les films et projets se sont multipliés pour être maintenant au nombre de 9, touchant à des sujets et technique de modélisation/captures aussi riches que variés.<br />
				Ainsi, vous pourrez retrouver sur ce site une liste complète ( à la date de juillet 2018) des travaux réalisés par ces équipes opérant dans la fondation Blender Open Movie. Un forum est également proposé pour les membres du site, afin que chacun exprime leur ressenti ou  ses préférences. <br />

				Bien que sous la licence des creatives communs, Tous les films/courts-métrages et images qui sont utilisés sur ce site sont les travaux de la fondation <a href="https://www.blender.org/about/projects/">Blender Open Movie</a> et du logiciel <a href="https://www.blender.org/">Blender</a>.<br />
				Néanmoins, le site qui vous est présenté est le résultat du Projet 5 : « Un Projet personnalisé » issu de la formation Développeur Web Junior proposé par OpenClassroom. <br />
				Bonne visite.
			</p>
			<?php
				while($movie = $upDateMovie->fetch() ){ 
			?>
			<h3>
				Dernier Film sorti: <?php echo $movie['titre_film']?> 
			</h3>

		 	<div id="resume_Last_Movie"> 
			 	<?php 
					echo '<img src="views/Images/Films/'. $movie['img_link'].'" alt="'. $movie['img_link'].'" class="FirstPageImg">'; 
				?>
					<p>
						Synopsis: <?php echo htmlspecialchars_decode($movie['resume']);?><br>
						Sortie le : <?php echo htmlspecialchars($movie['date_fr']); ?><br>
					</p>
			</div>

			<div id="presentation">
				<?php
					echo '<iframe class="formatVideo" src="'. $movie['movie_link'].'"frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
					?>

				<?php 
					echo '<p>Visionner le film :<a href="'. $movie['movie_link'].'" target="_blank"> Ici</a>
						<span id="sousTitre">
     						<i class="fas fa-deaf"></i>
     					</span>
			     	
			     	   <p id="activerSousTitre">Rappel: Les vidéos issues de l\'institut Blender Open Movie sont sous-titrés. <br />
			        		S\'ils ne sont pas automatiquement activés, l\'option est disponible lors de la lecture. Pour cela, rendez-vous dans les paramètres de la vidéo et sélectionner l\'option Sous-titrage.
			    		 </p>';
				?> 
			<?php
				}
				$upDateMovie->closeCursor();
			?> 
			</div>
		</div><!-- end of last_Movie_Out -->
	</div><!-- end of first_Page_Info -->
</section>

</body>
<script type="text/javascript" src="./views/javascript/diapo.js"></script>
<script type="text/javascript" src="./views/javascript/video.js"></script>
</html>