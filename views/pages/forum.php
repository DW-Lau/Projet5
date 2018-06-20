<section>
	<article>
	<h2>Forum:titre temporaire</h2>
	<?php
	
		while($listTopic = $getTopics->fetch()){
			
	?>
	<div class="infoMember">
		<?php echo $listTopic['pseudo']?> à écrit: le <?php echo $listTopic['date_message']?>
	</div>
	<div class="message"> <?php echo$listTopic['message_post'] ?></div>
	<?php
	}
	$getTopics->closeCursor();
	?>
	</article>
</section>