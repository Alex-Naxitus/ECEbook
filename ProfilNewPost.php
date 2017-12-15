<?php

$Email="lepriol.constant@gmail.com";

	$dbhost="localhost";
	$dbname="site";
	$dbuser="root";
	$dbpass=""; /* A modifier pour Alex */
	$conn = mysqli_connect("localhost", "$dbuser", "$dbpass");

	if (!$conn) {
		phpAlert( "Unable to connect to DB: " . mysqli_error($conn));
    	header ('Refresh: 0; url=http://localhost/prj/ProfilNewPropos.php');
	}

	if (!mysqli_select_db($conn,$dbname)) {
    	phpAlert( "Unable to select mydbname: " . mysqli_error($conn));
    	header ('Refresh: 0; url=http://localhost/prj/ProfilNewPropos.php');
	}

	 if (isset($_POST['Valider'])) {
        $post=$_POST["Post"];
		$humeur=$_POST["Humeur"];
		
		date_default_timezone_set("Europe/Paris");
		
		$newdate= date('Y-m-d H:i:s',time());
		
		$sql1 = "INSERT INTO posts(Email,Texte,Humeur,Date) VALUES ('$Email','$post','$humeur','$newdate') ";
		
		$result = mysqli_query($conn,$sql1);
		
	if (!$result) {
    	phpAlert( "Could not successfully run query ($sql1) from DB: " . mysqli_error($conn));
    	header ('Refresh: 0; url=http://localhost/prj/ProfilNewPost.php');
	}
	else
	{
		phpAlert("Post successful");
		header ('Refresh: 0; url=http://localhost/prj/ProfilNewPost.php');
	}
    }
	
	function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
	}

?>

<html>
	<head>
		<title>Publier</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link href="ProfilNewPost.css" rel="stylesheet" type="text/css" />
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
			<div class="col-sm-1" style="text-align : center;"><input class="boutton" Type="button" Value="Photos" Onclick="window.location.href='ProfilPhoto.html'"></div>			
			<div class="col-sm-2" style="text-align : center;"><img id="pp" src="pp.png" class="img-circle" alt="cover" width="155" height="155"/></div>			
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
		
		<br><br><br>
		
		<div class="row">
			<div class="col-sm-2" style="text-align : center;"></div>
			<div class="col-sm-8" style="text-align : center;">
				<div id="cadre" class="row">
					<div class="col-sm-2" style="text-align : right;">Nouveau post :</div>					
				</div>
				
				<form method="post">
				
				<div id="cadre2" class="row">
					<div class="col-sm-2" style="text-align : right;">Humeur :</div>
					<div class="col-sm-2" style="text-align : center;"><input class="input" type="radio" name="Humeur" value="Aucun">Aucun</div>
					<div class="col-sm-2" style="text-align : center;"><input class="input" type="radio" name="Humeur" value="Heureux">Heureux</div>
					<div class="col-sm-2" style="text-align : center;"><input class="input" type="radio" name="Humeur" value="Triste">Triste</div>
					<div class="col-sm-2" style="text-align : center;"><input class="input" type="radio" name="Humeur" value="En pleine forme">En pleine forme</div>
					<div class="col-sm-2" style="text-align : center;"><input class="input" type="radio" name="Humeur" value="Enervé">Enervé</div>
				</div>
				
				
				
				<div id="cadre2" class="row">
					<div class="col-sm-2" style="text-align : right;">Post :</div>
					<div class="col-sm-8" style="text-align : right;"><textarea rows="10" cols="100%" name="Post"></textarea></div>
				</div>		

				
				
				<div id="cadre2" class="row">
					<div class="col-sm-9" style="text-align : center;"></div>
					<div class="col-sm-2" style="text-align : right;"><input type="submit" name="Valider" value="Valider"></div>					
				</div>
				
				</form>
				
			</div>
		</div>
		
	</body>
</html>