<section>
	<article id="icones">
		<h2>Galerie d'avatars</h2>
		<p id="infoSelection">Pour choisir votre avatar veuillez cliquez sur son nom.</p>
		<div id="galerie">
			<?php
			while($listAvatar=$pickAvatar->fetch() ){
				echo '<figure>
				<img src="views/Images/Avatars/'.$listAvatar['lien_avatar'].'" alt="Avatar '.$listAvatar['lien_avatar'].'"><p id="avatChoisi">'.$listAvatar['lien_avatar'].'</p>
				</figure>
				';
				//var_dump($listAvatar['lien_avatar']);
			}
			$pickAvatar->closeCursor();
			?>
		</div>

	</article>
	<article id="Selection">
		<form id="validationAvatar" action="./index.php?action=validAvatar" method="post">
			<label>Vous avez choise:<span id="avatarChoice"></span></label>
			<input type="submit" id="send" value="Valider votre choix" />
		</form>
		
	</article>
	
</section>
<script type="text/javascript">
var selection=document.getElementById('avatChoisi');
var recupInf=document.getElementById('avatarChoice');

if(recupInf){
	selection.addEventListener("click", function( ){
		
	recupInf.textContent=selection.textContent;
	alert(recupInf.textContent)
});
}else{
	alert('rien');
}

</script>
</body>
</html>