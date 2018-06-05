<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">

		<meta name="description" content="Fiches et posts sur l'univers des films Marvel,(Sité réalisé dans le cadre de la formation OpenClassroom)">

		<meta name="keywords" content="Films, Marvel, super-héros, 10 ans, Iron Man, Captain America, Hulk, Thor, Avenger,Saga, Forum" />
			<!--Meta Facebook-->
		<meta property="og:title" content="" />
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
			<link rel="stylesheet" type="text/css" href="view/css/menu.css">
		<link rel="stylesheet" type="text/css" href="view/css/styles.css">
		<link rel="stylesheet" type="text/css" href="view/css/stylesA.css">
		<link rel="stylesheet" type="text/css" href="view/css/stylesResponsiv.css">
		<!--POLICES-->
		
		<link href="https://fonts.googleapis.com/css?family=Raleway:500" rel="stylesheet">

		<script src="view/tinymce/js/tinymce/tinymce.min.js"></script>
		<script>
			tinymce.init({ 
				selector:'textarea',
				height:'250px'
			});
		</script>
		<title>Saga Marvel</title>

	</head>

		<body>	
			<header>
				<div id="headband">
					<img src="" alt="Logo Marvel Studio">
					<h1>
						<a href="./index.php"> Saga Marvel:Le MCU </a>
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
								if (!isset($_SESSION['pseudo'])){
							?> 
								<li>
									<a href="./index.php?action=espace">Profil</a>
								</li>
							<?php
								}
							?>

							<?php
								if (!isset($_SESSION['id'])  ||$_SESSION['droits']==2){
									echo "<li><a href='./index.php?action=admin'>Admin</a></li>";
									}
							?> 
								
						</ul>
					</nav>
						<?php
							if (isset($_SESSION['pseudo'] ) ) {
								echo "<p> Bonjour ".$_SESSION['pseudo']."<br/><a href='./index.php?action=logOut'>Déconnexion</a><p>";
							}
						?>
						
				</div>
			</header>