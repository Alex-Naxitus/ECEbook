<?php

	$database;
	$db_handle;
	$db_found;
	$sql;
	$result;
	$row;
	$ppPath;
	include 'connexion user.php';

	if (!$db_handle) {
		phpAlert( "Unable to connect to DB: " . mysqli_error($db_handle));
    	header ('Refresh: 0; url=http://localhost/prj/ProfilAdmin.php');
	}

	if (!mysqli_select_db($db_handle,$database)) {
    	phpAlert( "Unable to select mydbname: " . mysqli_error($db_handle));
    	header ('Refresh: 0; url=http://localhost/prj/ProfilAdmin.php');
	}
	
	

    if (isset($_POST['Ajouter'])) {
        $email1=$_POST["E-MailADD"];
		$sql1 = "INSERT INTO users(Email) VALUES ('$email1')";
		$result = mysqli_query($db_handle,$sql1);
		
	if (!$result) {
    	phpAlert( "Could not successfully run query ($sql1) from DB: " . mysqli_error($db_handle));
    	header ('Refresh: 0; url=http://localhost/prj/ProfilAdmin.php');
	}
	else
	{
		phpAlert("Succesfully created account");
		header ('Refresh: 0; url=http://localhost/prj/ProfilAdmin.php');
	}
    }
	
	if (isset($_POST['Supprimer'])) {
		$email2=$_POST["E-MailSup"];
		$sql2 = "DELETE FROM users WHERE Email='$email2'";
		$result = mysqli_query($db_handle,$sql2);
	if (!$result) {
    	phpAlert("Could not successfully run query ($sql2) from DB: " . mysqli_error($db_handle));
    	header ('Refresh: 0; url=http://localhost/prj/ProfilAdmin.php');
	}
	else
	{
		phpAlert("Succesfully deleted");
		header ('Refresh: 0; url=http://localhost/prj/ProfilAdmin.php');
	}
	}

?>

<?php
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}
?>


<html>
	<head>
		<title>Administration</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link href="ProfilAdmin.css" rel="stylesheet" type="text/css" />
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
						<li> <a href="PageProfil.php<">Profil</a> </li>
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
			<div class="col-sm-1" style="text-align : center;"><input class="boutton" Type="button" Value="A propos" Onclick="window.location.href='ProfilPropos.php'"></div>
			<div class="col-sm-1" style="text-align : center;"></div>
			<div class="col-sm-1" style="text-align : center;"><input class="boutton" Type="button" Value="Amis" Onclick="window.location.href='test.html'"></div>
			<div class="col-sm-1" style="text-align : center;"></div>
			<div class="col-sm-1" style="text-align : left;"><input class="boutton" Type="button" Value="Réglages" Onclick="window.location.href='ProfilReglages.php'"></div>	
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
		
		<br><br><br>
		<div class="row">
			<div class="col-sm-2" style="text-align : center;"></div>
			<div id="administration" class="col-sm-8" style="text-align : center;">
				<br><br>
				<div class="row">
					<form method="post">
					<div class="col-sm-4" style="text-align : center;">Ajouter un utilisateur :</div>
					<div class="col-sm-4" style="text-align : center;"><input class='input' type="email" name="E-MailADD"></div>
					<div class="col-sm-4" style="text-align : center;"><input type="submit" name="Ajouter"></div>
					</form>
				</div>
				<br><br><br>
				<div class="row">
					<form method="post">
					<div class="col-sm-4" style="text-align : center;">Supprimer un utilisateur :</div>
					<div class="col-sm-4" style="text-align : center;"><input class='input' type="email" name="E-MailSup"></div>
					<div class="col-sm-4" style="text-align : center;"><input type="submit" name="Supprimer"></div>
					</form>
				</div>	
				<br><br>
			</div>
			<div class="col-sm-2" style="text-align : center;"></div>			
		</div>
		

	</body>
</html>

