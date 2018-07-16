<section>
	<article>
		<?php
			while($infoRecup = $editMovie->fetch() ){
		?>
			<h2><span class="maj">é</span>diter film:</h2>
			
			<fieldset>
				<form id="editMovie" action="./index.php?action=updateEntry&amp;id=<?php echo $infoRecup['id_film'];?>" method="post" enctype="multipart/form-data">
					
					<label>Titre du film :
						<input type="text" name="newtitle" id="title" value="<?php echo $infoRecup['titre_film'];?>" required/>
					</label>

					<label>Date de sortie
						<input type="date" name="newdate" value="<?php echo $infoRecup['date_fr'];?>" required/>
							<p id="date_event"><?php echo $infoRecup['date_fr'];?></p>
					</label>
				
					<label> Résumé du film:
						<textarea class="tinymce" name="newtinymce_Movie"><?php echo $infoRecup['resume'];?></textarea>
					</label>

					<label>Lien du film :
						<input type="text" name="newlink" id="link" value="<?php echo $infoRecup['movie_link'];?>" required/>
					</label>

					<label>Titre du fichier :
						<input type="text" name="editMovie" id="editTitleMovie" value="<?php echo $infoRecup['titre_film'];?>" required/>
							<p id="prevention"></p>
					</label>
					<label>Nom du fichier: ('jpg','jpeg', 'gif' et 'png' | max. 3 Mo) :
	     				<input type="file" name="newimgFilms" id="imgFilms" required/>
	   				</label>

					<input type="submit" id="reEdit" value="Publier" />
			
				</form>
			</fieldset>
			<?php
				}
				$editMovie->closeCursor();
			?>
	</article>
</section>
</body>
</html>