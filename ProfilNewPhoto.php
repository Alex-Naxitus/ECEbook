<?php 
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


		// initialisation BDD
		$legende   = isset($_POST["legende"])?$_POST["legende"] : "";
		$lieu = isset($_POST["Lieu"])?$_POST["Lieu"] : "";
		$feeling = isset($_POST["Humeur"])?$_POST["Humeur"] :"" ;
		

		

		$target = "images/".basename($_FILES['image']['name']);	
		$image = $_FILES['image']['name'];
		$date =date('Y-m-d');
		$time = date('H:i:s');
		$sql = "INSERT INTO `photo` (`ID`, `image`, `Lieux`, `Date`, `Heure`, `feeling`, `activite`, `accesibilite`, `legende`,`Email`) 
		VALUES (NULL, '$image', '$lieu', '$date', '$time', '$feeling', '', '1', '$legende', '$Email');";
		mysqli_query($db_handle, $sql);
		//$sql2= "UPDATE `users` SET `PP` = '$image' WHERE `users`.`Nom` = '$nom' AND `users`.`Email` = '$Email'";
		//mysqli_query($db_handle, $sql2);
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



<html>
	<head>
		<title>Nouvelle image/vidéo</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link href="profilNewPhoto.css" rel="stylesheet" type="text/css" />
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
			<div class="col-sm-7" style="text-align : center;"></div>
			<div class="col-sm-1" style="text-align : center;"><input class="boutton2" Type="button" Value="Administration" Onclick="window.location.href='ProfilAdmin.html'"></div>
			<div class="col-sm-1" style="text-align : center;"></div>
			<div class="col-sm-1" style="text-align : center;"><input class="boutton2" Type="button" Value="Messages" Onclick="window.location.href='test.html'"></div>
			<div class="col-sm-1" style="text-align : center;"></div>
			<div class="col-sm-1" style="text-align : left;"><input id="marqueur" class="boutton2" Type="button" Value="Publier" Onclick="window.location.href='ProfilPublier.html'"></div>
		</div>
		
		<hr>	

		<br>
		
		<form class="row" action="ProfilNewPhoto.php" method="post" enctype="multipart/form-data">
			<div class="col-sm-2" style="text-align : center;"></div>
			<div class="col-sm-8" style="text-align : center;">
				<div id="cadre" class="row">
					<div class="col-sm-1" style="text-align : right;"></div>
					<div class="col-sm-10" style="text-align : left;">Ajouter une nouvelle image ou vidéo </div>					
				</div>
				
				<div id="cadre2" class="row">
					<div class="col-sm-3" style="text-align : left;">Sélectionnez le fichier à charger  :</div>
					<div class="col-sm-1" style="text-align : center;"></div>					
					<div class="col-sm-2" style="text-align : left;"><input type="file" name="image"></div>
				</div>
				
				<div id="cadre2" class="row">
					<div class="col-sm-3" style="text-align : left;">Lieu :</div>
					<div class="col-sm-1" style="text-align : center;"></div>
					<div class="col-sm-1" style="text-align : center;"><input class="input" type="text" name="Lieu"></div>
				</div>
				
				<div id="cadre2" class="row">
					<div class="col-sm-2" style="text-align : left;">Humeur :</div>
					<div class="col-sm-2" style="text-align : center;"><input class="input" type="radio" name="Humeur" value="Aucun">Aucun</div>
					<div class="col-sm-2" style="text-align : center;"><input class="input" type="radio" name="Humeur" value="Heureux">Heureux</div>
					<div class="col-sm-2" style="text-align : center;"><input class="input" type="radio" name="Humeur" value="Triste">Triste</div>
					<div class="col-sm-2" style="text-align : center;"><input class="input" type="radio" name="Humeur" value="En pleine forme">En pleine forme</div>
				</div>
				
				<div id="cadre3" class="row">
					<div class="col-sm-2" style="text-align : left;">Légende :</div>
					<div class="col-sm-1" style="text-align : right;"></div>
					<div class="col-sm-7" style="text-align : right;"><textarea rows="5" cols="100%" name="legende"></textarea></div>
				</div>		
				
				<div id="cadre4" class="row">
					<div class="col-sm-9" style="text-align : center;"></div>
					<div class="col-sm-2" style="text-align : right;"><input type="submit" name="Valider" value="Valider"></div>					
				</div>
				
			</div>
		</form>
		
	</body>
</html>