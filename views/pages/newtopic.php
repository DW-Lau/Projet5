<article id="newTopic">
	<h2>Créer un nouveau sujet de discussion:</h2>

		<form id="getNewSubject" action="./index.php?action=newTopic" method="post" enctype="multipart/form-data">
			<fieldset class="newSubject">
				<label>Auteur du sujet: <?php echo $_SESSION['pseudo'];?> </label>
				<label>Titre du topic:<input type="text" name="titreTopic" required/></label>
				<label> Message: <textarea class="tinymce" name="tinymce_Topic"></textarea>
				</label>
				<input type="submit" id="send" value="Créer" />
			</fieldset>
		</form>
</article>