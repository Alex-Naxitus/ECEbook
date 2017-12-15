<?php
	//recuprer l'email pour savoir quel est l'user
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
	$_SESSION['cle']=$Email;
	//fermer !bdd
	mysqli_close($db_handle);
	


?>


<!DOCTYPE>
<html>
	<head>
		<title>Publier</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link href="profilPublier.css" rel="stylesheet" type="text/css" />
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
						<li class="active"> <a href="#">Accueil</a> </li>
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
			<div class="col-sm-1" style="text-align : center;"><input class="boutton" Type="button" Value="Photos" Onclick="window.location.href='ProfilPhoto.html'"></div>			
			<div class="col-sm-2" style="text-align : center;"><img id="pp" src=<?php echo $ppPath ?> class="img-circle" alt="cover" width="155" height="155"/></div>			
			<div class="col-sm-1" style="text-align : center;"><input class="boutton" Type="button" Value="A propos" Onclick="window.location.href='ProfilPropos.html'"></div>
			<div class="col-sm-1" style="text-align : center;"></div>
			<div class="col-sm-1" style="text-align : center;"><input class="boutton" Type="button" Value="Amis" Onclick="window.location.href='test.html'"></div>
			<div class="col-sm-1" style="text-align : center;"></div>
			<div class="col-sm-1" style="text-align : left;"><input class="boutton" Type="button" Value="Réglages" Onclick="window.location.href='ProfilReglages.html'"></div>	
		</div>
		<div class="row">
			<div class="col-sm-1" style="text-align : center;"></div>
			<div class="col-sm-4" style="text-align : left;"><p id="nompseudo"><?php echo $row['Nom']." ".$row['Prenom']." ".$row['pseudo']?></p></div>
			<div class="col-sm-2" style="text-align : center;"></div>
			<div class="col-sm-1" style="text-align : center;"><input class="boutton2" Type="button" Value="Administration" Onclick="window.location.href='ProfilAdmin.html'"></div>
			<div class="col-sm-1" style="text-align : center;"></div>
			<div class="col-sm-1" style="text-align : center;"><input class="boutton2" Type="button" Value="Messages" Onclick="window.location.href='test.html'"></div>
			<div class="col-sm-1" style="text-align : center;"></div>
			<div class="col-sm-1" style="text-align : left;"><input id="marqueur" class="boutton2" Type="button" Value="Publier" Onclick="window.location.href='ProfilPublier.html'"></div>
		</div>
		<hr>
		<br><br>
		
		<div class="row">
		<div class="col-sm-3" style="text-align : center;"></div>
			<div class="col-sm-3" style="text-align : center;">
				<br>
				<input class="boutton3" Type="button" Value="Ecrire un nouveau post" Onclick="window.location.href='ProfilNewPost.html'">
				<br>
			</div>
			<div class="col-sm-3" style="text-align : center;">
				<br>
				<input class="boutton3"  Type="button" Value="Ajouter un nouvelle photo ou vidéo" Onclick="window.location.href='ProfilNewPhoto.php'">
				<br>
			</div>
		</div>
		
		<br>
		
		<div class="row">
			<div class="col-sm-3" style="text-align : center;"></div>
			<div class="col-sm-3" style="text-align : center;">
				<br>
				<input class="boutton3" Type="button" Value="Ajouter un nouvel évènement" Onclick="window.location.href='test.html'">	
				<br>
			</div>
			<div class="col-sm-3" style="text-align : center;">
				<br>
				<input class="boutton3" Type="button" Value="Ajouter un nouvel album" Onclick="window.location.href='ProfilNewAlbum.html'">
				<br>
			</div>
		</div>
	
	
	
	
	</body>	
</html>