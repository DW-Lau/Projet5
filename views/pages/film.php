<section>
	<article id="OneMovie">
	<div id="moviePage">	<?php
		while ( $movie=$selectedMovie->fetch() ) {
		?>
		
		<h2> <?php echo htmlspecialchars($movie['titre_film'])?></h2>
		
			<p class="presentation">
		<?php 
			echo '<img src="views/Images/Films/'. $movie['img_link'].'" alt="'. $movie['img_link'].'" id="imgPoster"'; 
		?> 
		
			<i>
				<?php echo htmlspecialchars($movie['titre_film'])?> est sortie en:  <?php echo htmlspecialchars($movie['date_fr'])?>.</br>
			</i>
			<?php echo htmlspecialchars_decode($movie['resume'])?>
			
		</p>
		
		<?php
			echo '<iframe width="560" height="315" src="'. $movie['movie_link'].'"frameborder="0" allow="autoplay; encrypted-media" allowfullscreen class="movie"></iframe>
			<p id="warningVideo">Si votre navigateur n\'affiche pas la vidéo, cliquez <a href="'. $movie['movie_link'].'"target="_blank">ICI</a></p>';
			?>
			
		<?php 
		}
		$selectedMovie-> closeCursor();
		?>
</div>
	</article>

</section>
<!-- 
    </body> <script>
      
      var tag = document.createElement('script');

      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.
      var player;
      function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
          height: '360',
          width: '640',
          videoId: 'M7lc1UVf-VE',
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          }
        });
      }

      // 4. The API will call this function when the video player is ready.
      function onPlayerReady(event) {
        event.target.playVideo();
      }

      // 5. The API calls this function when the player's state changes.
      //    The function indicates that when playing a video (state=1),
      //    the player should play for six seconds and then stop.
      var done = false;
      function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING && !done) {
          setTimeout(stopVideo, 6000);
          done = true;
        }
      }
      function stopVideo() {
        player.stopVideo();
      }
    </script> -->
    </html>