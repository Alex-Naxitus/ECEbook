﻿<?php

	session_start();
	$Email = $_SESSION['cle'];
	//intialisation BDD
	$database;
	$db_handle;
	$db_found;
	$sql;
	$result;
	$row;
	$ppPath;
	include 'connexion user.php';
	//récupérer photo de profil (si existante)
	$_SESSION['cle']=$Email;
	//fermer !bdd
	mysqli_close($db_handle);

?>

<!DOCTYPE>
<html>
	<head>
		<title>A propos</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link href="ProfilPropos.css" rel="stylesheet" type="text/css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
	</head>
	
	<body>
		<nav class="navbar navbar-fixed-top">
			<div class="container-fluid">
				<div class="col-sm-2" style="text-align : center;"></div>
				<div class="col-sm-4" style="text-align : center;">
					<ul class="nav navbar-nav">
						<li class="active"> <a href="#"></a> </li>
						<li> <a href="#">Fils d'actualité</a> </li>
						<li> <a href="PageProfil.php">Profil</a> </li>
						<li> <a href="Acceuil.php">Déconnexion</a> </li>
					</ul>
				</div>
				<div class="col-sm-4" style="text-align : center">
					<form class="navbar-form navbar-right inline-form">
						<div class="form-group">
							<input type="search" class="input-sm form-control" placeholder="Recherche">
							<button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-eye-open"></span> Chercher</button>
						</div>
					</form>
				</div>
			</div>
		</nav>
		<img id="cover" src="cover.jpg" alt="cover" width="100%%" height="200"/>
		
		<br><br>
		
		<div class="row">
			<div class="col-sm-1" style="text-align : right;"><input class="boutton" Type="button" Value="Chronologie" Onclick="window.location.href='ProfilChronologie.html'"></div>
			<div class="col-sm-1" style="text-align : center;"></div>
			<div class="col-sm-1" style="text-align : center;"><input class="boutton" Type="button" Value="Albums" Onclick="window.location.href='ProfilAlbum.html'"></div>
			<div class="col-sm-1" style="text-align : center;"></div>
			<div class="col-sm-1" style="text-align : center;"><input class="boutton" Type="button" Value="Photos" Onclick="window.location.href='ProfilPhoto.php'"></div>			
			<div class="col-sm-2" style="text-align : center;"><a href="PageProfil.php"><img id="pp" src=<?php echo $ppPath ?> class="img-circle" alt="cover" width="155" height="155"/></a></div>			
			<div class="col-sm-1" style="text-align : center;"><input id="marqueur" class="boutton" Type="button" Value="A propos" Onclick="window.location.href='ProfilPropos.php'"></div>
			<div class="col-sm-1" style="text-align : center;"></div>
			<div class="col-sm-1" style="text-align : center;"><input class="boutton" Type="button" Value="Amis" Onclick="window.location.href='test.html'"></div>
			<div class="col-sm-1" style="text-align : center;"></div>
			<div class="col-sm-1" style="text-align : left;"><input class="boutton" Type="button" Value="Réglages" Onclick="window.location.href='ProfilReglages.php'"></div>	
		</div>
		<div class="row">
			<div class="col-sm-1" style="text-align : center;"></div>
			<div class="col-sm-4" style="text-align : left;"><p id="nompseudo"><?php echo $row['Nom']." ".$row['Prenom']." ".$row['pseudo']?></p></div>
			<div class="col-sm-2" style="text-align : center;"></div>
			<div class="col-sm-1" style="text-align : center;"><input class="boutton2" Type="button" Value="Administration" Onclick="window.location.href='ProfilAdmin.php'"></div>
			<div class="col-sm-1" style="text-align : center;"></div>
			<div class="col-sm-1" style="text-align : center;"><input class="boutton2" Type="button" Value="Messages" Onclick="window.location.href='test.html'"></div>
			<div class="col-sm-1" style="text-align : center;"></div>
			<div class="col-sm-1" style="text-align : left;"><input class="boutton2" Type="button" Value="Publier" Onclick="window.location.href='ProfilPublier.php'"></div>
		</div>
		<hr>
		
		<br><br><br>
		
		<div class="row">
			<div class="col-sm-3" style="text-align : center;"></div>
			<div id="propos" class="col-sm-6" style="text-align : left;">
				<div class="col-sm-1" style="text-align : center;"></div>
				<div class="col-sm-5" style="text-left : left;">Modifier ses informations personelles</div>					
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3" style="text-align : center;"></div>
			<div id="propos2" class="col-sm-6" style="text-align : center;">
				<div class="row">
					<div class="col-sm-1" style="text-align : left;"></div>
					<div class="col-sm-5" style="text-align : left;">Nom :</div>
					<div class="col-sm-5" style="text-align : left;"><?php echo $row['Nom']; ?> </div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-1" style="text-align : left;"></div>
					<div class="col-sm-5" style="text-align : left;">Prénom :</div>
					<div class="col-sm-5" style="text-align : left;"><?php echo $row['Prenom']; ?> </div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-1" style="text-align : left;"></div>
					<div class="col-sm-5" style="text-align : left;">Date de naissance :</div>
					<div class="col-sm-5" style="text-align : left;"><?php echo $row['date']; ?> </div>
				</div>
				<br>
					<div class="row">
					<div class="col-sm-1" style="text-align : left;"></div>
					<div class="col-sm-5" style="text-align : left;">Pseudo :</div>
					<div class="col-sm-5" style="text-align : left;"><?php echo $row['pseudo']; ?></div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-1" style="text-align : left;"></div>
					<div class="col-sm-5" style="text-align : left;">E-mail :</div>
					<div class="col-sm-5" style="text-align : left;"><?php echo $row['Email']; ?></div>
				</div>
				<br>
				<div class="row">
					<div class="col-sm-1" style="text-align : left;"></div>
					<div class="col-sm-5" style="text-align : left;">Nombre d'amis :</div>
					<div class="col-sm-5" style="text-align : left;">5 </div>
				</div>
			</div>
		</div>	
		
		
	</body>
</html>