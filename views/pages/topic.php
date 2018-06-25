<section>

	<article id="">
		<?php
		while($answer=$picked->fetch() ){
			var_dump("expression");
			?>
		<div class="listAnswer">
			<div class="infoMember">
				<?php echo "hello";
				?>
				<?php echo $answer['id_auteur']?> à écrit:<?php echo $answer['titre_post']?>;
			</div>
			<div class="msg">
				<?php echo $answer['message_post']?>
			</div>
		</div>
		<?php
		}
		$picked->closeCursor();
		?>
	</article>
</section>