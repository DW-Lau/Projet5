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
		<p id="avatChoisi">'.$listAvatar['lien_avatar'].'</p>
	</article>
	<article id="Selection">
		<p>Vous avez choisie : <span id="avatarChoice"></span></p>
		<button>
			<?php
			echo '<a href=./index.php?action=validAvatar&amp;id_avatar='.$listAvatar['lien_avatar'].'&amp;id_membre='.$_SESSION['id'].'"> Valider votre choix</a>';
			?></button>
	</article>
	
</section>
<script type="text/javascript">
var selection=document.getElementById('avatChoisi');
var recupInf=document.getElementById('avatarChoice');

if(selection){
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