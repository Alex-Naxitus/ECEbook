<?php 
	//cle reconnaissance utilisateur
	session_start();
	$Email = $_SESSION['cle'];
	
	$database;
	$db_handle;
	$db_found;
	$sql;
	$result;
	$row;
	$ppPath;
	include 'connexion user.php';
	

	if(isset($_POST['Valider']))
	{
		//recuprer l'email pour savoir quel est l'user


		$target = "images/".basename($_FILES['image']['name']);	
		$image = $_FILES['image']['name'];
		$sql2= "UPDATE `users` SET `PP` = '$image' WHERE `users`.`Email` = '$Email'";
		mysqli_query($db_handle, $sql2);
		if (move_uploaded_file($_FILES['image']['tmp_name'],$target))
		{
			header('Refresh: 0; url=http://localhost/prj/PageProfil.php');
		}else
		{
		$msg = "There was a problem uploading image";
		}
	mysqli_close($db_handle);
	}
		$_SESSION['cle']=$Email;
	?>


<!DOCTYPE>
<html>
	<head>
		<title>Nouvelle photo de profil</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link href="ProfilNewPP.css" rel="stylesheet" type="text/css" />
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
						<li> <a href="PageProfil.html">Profil</a> </li>
						<li> <a href="Acceuil.html">Déconnexion</a> </li>
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
			<div class="col-sm-1" style="text-align : center;"><input class="boutton" Type="button" Value="A propos" Onclick="window.location.href='ProfilPropos.php'"></div>
			<div class="col-sm-1" style="text-align : center;"></div>
			<div class="col-sm-1" style="text-align : center;"><input class="boutton" Type="button" Value="Amis" Onclick="window.location.href='test.html'"></div>
			<div class="col-sm-1" style="text-align : center;"></div>
			<div class="col-sm-1" style="text-align : left;"><input id="marqueur" class="boutton" Type="button" Value="Réglages" Onclick="window.location.href='ProfilReglages.php'"></div>	
		</div>
		<div class="row">
			<div class="col-sm-7" style="text-align : center;"></div>
			<div class="col-sm-1" style="text-align : center;"><input class="boutton2" Type="button" Value="Administration" Onclick="window.location.href='ProfilAdmin.php'"></div>
			<div class="col-sm-1" style="text-align : center;"></div>
			<div class="col-sm-1" style="text-align : center;"><input class="boutton2" Type="button" Value="Messages" Onclick="window.location.href='test.html'"></div>
			<div class="col-sm-1" style="text-align : center;"></div>
			<div class="col-sm-1" style="text-align : left;"><input class="boutton2" Type="button" Value="Publier" Onclick="window.location.href='ProfilPublier.php'"></div>
		</div>
		
		<hr>	

		<br>
		
		<form class="row" action="ProfilNewPP.php" method="post" enctype="multipart/form-data">
			<div class="col-sm-2" style="text-align : center;"></div>
			<div class="col-sm-8" style="text-align : center;">
				<div id="cadre" class="row">
					<div class="col-sm-1" style="text-align : right;"></div>
					<div class="col-sm-10" style="text-align : left;">Modifier sa photo de profil </div>					
				</div>
				
				<div id="cadre2" class="row">
					<div class="col-sm-3" style="text-align : left;">Sélectionnez le fichier à charger  :</div>
					<div class="col-sm-1" style="text-align : center;"></div>					
					<div class="col-sm-2" style="text-align : left;"><input type="file" name="image"></div>
				</div>
				<div id="cadre4" class="row">
					<div class="col-sm-9" style="text-align : center;"></div>
					<div class="col-sm-2" style="text-align : right;"><input type="submit" name="Valider" value="Valider"></div>					
				</div>
				
			</div>
		</form>
		
	</body>
</html>