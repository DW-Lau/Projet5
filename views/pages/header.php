<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>

		<meta name="description" content="Fiches et forum sur les films d'animation de la fondation Blender Open Movie,(Sité réalisé dans le cadre de la formation OpenClassroom)">

		<meta name="keywords" content="Films, Forum, Blender,3D, animation,court-métrage,logiciel, fondation, Open Movie" />
			<!--Meta Facebook-->
		<meta property="og:title" content="Les films de la fondation Blender Open Movie" />
		<meta property="og:type" content="article" /> 
		<meta property="og:url" content="http://www.projet5.laura-lariccia.fr" /> 
		<meta property="og:image" content="images/" /> 
		<meta property="og:description" content="" /> 
		<meta property="og:site_name" content="" /> 
		<meta property="fb:admins" content="Facebook numeric ID" />
			
			<!--Meta Twitter-->
		<meta name="twitter:card" content="images/.png">
		<meta name="twitter:site" content="@laura"> 
		<meta name="twitter:title" content="">
		<meta name="twitter:description" content=""> 
		<meta name="twitter:creator" content="@author_handle">
		<meta name="twitter:image:src" content="images.png">
			<!--FIN META -->
		
		<link rel="stylesheet" type="text/css" href="views/css/styles.css">
		<link rel="stylesheet" type="text/css" href="views/css/responsiv.css">
	
		<!--POLICES-->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">


		<link href="https://fonts.googleapis.com/css?family=Raleway:500" rel="stylesheet">

		<script src="views/tinymce/js/tinymce/tinymce.min.js"></script>
		<script>
			tinymce.init({ 
				selector:'textarea',
				height:'250px'
			});
		</script>

		<title>Fondation Blender Open Mobie</title>

	</head>

	<body>	
		<header>
			<div id="headband">
				<img src="views/Images/Logo_Blender.png" alt="Logo Blender">
					<h1>
						<a href="./index.php">  Blender Open Projects </a>
					</h1>
					
			</div>
					
			<div id="nav_Log">
				<nav>
					<ul>
						<li>
							<a href="./index.php?action=films">Films</a>
						</li>
						<li>
							<a href="./index.php?action=forum">Forum</a>
						</li>
						<?php
							if (!isset($_SESSION['pseudo'])){
						?> 
							<li>
								<a href="./index.php?action=connexion">Connexion</a>
							</li>
						<?php
							}
						?>
						<?php
							if(isset($_SESSION['droits'])&&$_SESSION['droits']==3) {
								echo "<li><a href='./index.php?action=admin'>Admin</a></li>";
							}
							elseif(isset($_SESSION['droits'])&&$_SESSION['droits']==2||isset($_SESSION['droits'])&&$_SESSION['droits']==1){
								echo "<li><a href='./index.php?action=espace'>Profil</a></li>";
							}
						?> 
					</ul>
				</nav>
				
				<div id="recapProfil">
						<?php
							if (isset($_SESSION['pseudo'] ) ) {
								if (isset($_SESSION['avatar'])) {
									echo '<img src="views/Images/Avatars/'. $_SESSION['avatar'].'"  class="Profil">';
								}else{
									echo "Rendez_vous dans votre profil pour choisir un avatar";
									$_SESSION['avatar'];
								}
								echo "<p id='pseudoProfil'> Bonjour ".$_SESSION['pseudo']."<br/><a href='./index.php?action=logOut'><i class='fas fa-sign-out-alt'>Déconnexion</i></a><p>";
							}
						?>
				</div>
			</div>
		</header>