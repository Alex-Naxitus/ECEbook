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
		
		//Album :
		$legende   = isset($_POST["LegendeA"])?$_POST["LegendeA"] : "";
		$lieu = isset($_POST["LieuA"])?$_POST["LieuA"] : "";
		$feeling = isset($_POST["Humeur"])?$_POST["HumeurA"] :"" ;
		date_default_timezone_set("Europe/Paris");
		$date =date('Y-m-d');
		$time = date('H:i:s');
		
		$target = "images/".basename($_FILES['imageA']['name']);	
		$image = $_FILES['imageA']['name'];
		
		$sql2= "SELECT * FROM `photo` ORDER BY `ID` DESC LIMIT 1";
		$result2=mysqli_query($db_handle, $sql2);
		$row2=mysqli_fetch_assoc($result2);
		$lastID=$row2['ID'];
		
		if(is_null($lastID)){
			$lastID=0;
		}
		$ID=$lastID+1;
		
		
		$sql = "INSERT INTO `photo` (`ID`, `image`, `Lieux`, `Date`, `Heure`, `feeling`, `activite`, `accesibilite`, `legende`,`Email`) 
		VALUES ('$ID', '$image', '$lieu', '$date', '$time', '$feeling', '', '1', '$legende', '$Email');";
		mysqli_query($db_handle, $sql);
		
		if (move_uploaded_file($_FILES['imageA']['tmp_name'],$target))
		{
			phpAlert("Succesfully posted cover image");
		}else
		{
		}
		
	
		//Image1:
		$legende   = isset($_POST["Legende"])?$_POST["Legende"] : "";
		$lieu = isset($_POST["Lieu"])?$_POST["Lieu"] : "";
		$feeling = isset($_POST["Humeur"])?$_POST["Humeur"] :"" ;
		
		$date =date('Y-m-d');
		$time = date('H:i:s');
		
		$target = "images/".basename($_FILES['image']['name']);	
		$image = $_FILES['image']['name'];
		if( ($image == "")||(is_null($image)))
		{
			phpAlert("1 image per album minimum");
			header('Refresh: 0; url=http://localhost/prj/ProfilNewAlbum.php');
		}
		
		$sql = "INSERT INTO `photo` (`ID`, `image`, `Lieux`, `Date`, `Heure`, `feeling`, `activite`, `accesibilite`, `legende`,`Email`) 
		VALUES ('$ID', '$image', '$lieu', '$date', '$time', '$feeling', '', '1', '$legende', '$Email');";
		mysqli_query($db_handle, $sql);
		
		if (move_uploaded_file($_FILES['image']['tmp_name'],$target))
		{
			phpAlert("Succesfully posted image 1");
			header('Refresh: 0; url=http://localhost/prj/ProfilNewAlbum.php');
		}else
		{
			phpAlert("There was a problem uploading image");
			header('Refresh: 0; url=http://localhost/prj/ProfilNewAlbum.php');
		}
		
	
		//Image2:
		$legende   = isset($_POST["Legende2"])?$_POST["Legende2"] : "";
		$lieu = isset($_POST["Lieu2"])?$_POST["Lieu2"] : "";
		$feeling = isset($_POST["Humeur2"])?$_POST["Humeur2"] :"" ;
		$date =date('Y-m-d');
		$time = date('H:i:s');
		
		$target = "images/".basename($_FILES['image2']['name']);	
		$image = $_FILES['image2']['name'];
		
		$sql = "INSERT INTO `photo` (`ID`, `image`, `Lieux`, `Date`, `Heure`, `feeling`, `activite`, `accesibilite`, `legende`,`Email`) 
		VALUES ('$ID', '$image', '$lieu', '$date', '$time', '$feeling', '', '1', '$legende', '$Email');";
		mysqli_query($db_handle, $sql);
		
		if (move_uploaded_file($_FILES['image2']['tmp_name'],$target))
		{
			phpAlert("Succesfully posted image 2");
			header('Refresh: 0; url=http://localhost/prj/ProfilNewAlbum.php');
		}else
		{
		}
		
	//Image3:
		$legende   = isset($_POST["Legende3"])?$_POST["Legende3"] : "";
		$lieu = isset($_POST["Lieu3"])?$_POST["Lieu3"] : "";
		$feeling = isset($_POST["Humeur3"])?$_POST["Humeur3"] :"" ;
		$date =date('Y-m-d');
		$time = date('H:i:s');
		
		$target = "images/".basename($_FILES['image3']['name']);	
		$image = $_FILES['image3']['name'];
		
		$sql = "INSERT INTO `photo` (`ID`, `image`, `Lieux`, `Date`, `Heure`, `feeling`, `activite`, `accesibilite`, `legende`,`Email`) 
		VALUES ('$ID', '$image', '$lieu', '$date', '$time', '$feeling', '', '1', '$legende', '$Email');";
		mysqli_query($db_handle, $sql);
		
		if (move_uploaded_file($_FILES['image3']['tmp_name'],$target))
		{
			phpAlert("Succesfully posted image 3");
			header('Refresh: 0; url=http://localhost/prj/ProfilNewAlbum.php');
		}else
		{
		}
		
		
	//Image4:
		$legende   = isset($_POST["Legende4"])?$_POST["Legende4"] : "";
		$lieu = isset($_POST["Lieu4"])?$_POST["Lieu4"] : "";
		$feeling = isset($_POST["Humeur4"])?$_POST["Humeur4"] :"" ;
		$date =date('Y-m-d');
		$time = date('H:i:s');
		
		$target = "images/".basename($_FILES['image4']['name']);	
		$image = $_FILES['image4']['name'];
		
		$sql = "INSERT INTO `photo` (`ID`, `image`, `Lieux`, `Date`, `Heure`, `feeling`, `activite`, `accesibilite`, `legende`,`Email`) 
		VALUES ('$ID', '$image', '$lieu', '$date', '$time', '$feeling', '', '1', '$legende', '$Email');";
		mysqli_query($db_handle, $sql);
		
		if (move_uploaded_file($_FILES['image4']['tmp_name'],$target))
		{
			phpAlert("Succesfully posted image 4");
			header('Refresh: 0; url=http://localhost/prj/ProfilNewAlbum.php');
		}else
		{
		}

		$_SESSION['cle']=$Email;
		
	//Image5:
		$legende   = isset($_POST["Legende5"])?$_POST["Legende5"] : "";
		$lieu = isset($_POST["Lieu5"])?$_POST["Lieu5"] : "";
		$feeling = isset($_POST["Humeur5"])?$_POST["Humeur5"] :"" ;
		$date =date('Y-m-d');
		$time = date('H:i:s');
		
		$target = "images/".basename($_FILES['image5']['name']);	
		$image = $_FILES['image5']['name'];
		
		$sql = "INSERT INTO `photo` (`ID`, `image`, `Lieux`, `Date`, `Heure`, `feeling`, `activite`, `accesibilite`, `legende`,`Email`) 
		VALUES ('$ID', '$image', '$lieu', '$date', '$time', '$feeling', '', '1', '$legende', '$Email');";
		mysqli_query($db_handle, $sql);
		
		if (move_uploaded_file($_FILES['image5']['tmp_name'],$target))
		{
			phpAlert("Succesfully posted image 5");
			header('Refresh: 0; url=http://localhost/prj/ProfilNewAlbum.php');
		}else
		{
		header('Refresh: 0; url=http://localhost/prj/ProfilNewAlbum.php');
		}
		
		
	mysqli_close($db_handle);
	}
		$_SESSION['cle']=$Email;

	function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
	}

?>

<html>
	<head>
		<title>Ajouter un album photo</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link href="ProfilNewAlbum.css" rel="stylesheet" type="text/css" />
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
			<div class="col-sm-2" style="text-align : center;"><img id="pp" src=<?php echo $ppPath ?> class="img-circle" alt="cover" width="155" height="155"/></div>		
			<div class="col-sm-1" style="text-align : center;"><input class="boutton" Type="button" Value="A propos" Onclick="window.location.href='ProfilPropos.html'"></div>
			<div class="col-sm-1" style="text-align : center;"></div>
			<div class="col-sm-1" style="text-align : center;"><input class="boutton" Type="button" Value="Amis" Onclick="window.location.href='ProfilAmi.html'"></div>
			<div class="col-sm-1" style="text-align : center;"></div>
			<div class="col-sm-1" style="text-align : left;"><input class="boutton" Type="button" Value="Réglages" Onclick="window.location.href='ProfilReglages.html'"></div>	
		</div>
		<div class="row">
			<div class="col-sm-1" style="text-align : center;"></div>
			<div class="col-sm-4" style="text-align : left;"><p id="nompseudo"></p></div>
			<div class="col-sm-2" style="text-align : center;"></div>
			<div class="col-sm-1" style="text-align : center;"><input class="boutton2" Type="button" Value="Administration" Onclick="window.location.href='ProfilAdmin.html'"></div>
			<div class="col-sm-1" style="text-align : center;"></div>
			<div class="col-sm-1" style="text-align : center;"><input class="boutton2" Type="button" Value="Messages" Onclick="window.location.href='test.html'"></div>
			<div class="col-sm-1" style="text-align : center;"></div>
			<div class="col-sm-1" style="text-align : left;"><input id="marqueur" class="boutton2" Type="button" Value="Publier" Onclick="window.location.href='ProfilPublier.html'"></div>
		</div>
		
		<hr>	

		<br>
		<form class="row" action="ProfilNewAlbum.php" method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="col-sm-2" style="text-align : center;"></div>
			<div class="col-sm-8" style="text-align : center;">
				<div id="cadre" class="row">
					<div class="col-sm-1" style="text-align : right;"></div>
					<div class="col-sm-10" style="text-align : left;">Ajouter un nouvel album photo </div>					
				</div>
				
				<div id="cadre2" class="row">
					<div class="col-sm-3" style="text-align : left;">Nom :</div>
					<div class="col-sm-1" style="text-align : center;"></div>
					<div class="col-sm-1" style="text-align : center;"><input class="input" type="text" name="NomA"></div>
				</div>
				
				<div id="cadre2" class="row">
					<div class="col-sm-3" style="text-align : left;">Sélectionnez la photo de couverture  :</div>
					<div class="col-sm-1" style="text-align : center;"></div>					
					<div class="col-sm-2" style="text-align : left;"><input type=file name="imageA"></div>
				</div>
				
				<div id="cadre2" class="row">
					<div class="col-sm-3" style="text-align : left;">Lieu :</div>
					<div class="col-sm-1" style="text-align : center;"></div>
					<div class="col-sm-1" style="text-align : center;"><input class="input" type="text" name="LieuA"></div>
				</div>
				
				<div id="cadre2" class="row">
					<div class="col-sm-2" style="text-align : left;">Humeur :</div>
					<div class="col-sm-2" style="text-align : center;"><input class="input" type="radio" name="HumeurA" value="Aucun">Aucun</div>
					<div class="col-sm-2" style="text-align : center;"><input class="input" type="radio" name="HumeurA" value="Heureux">Heureux</div>
					<div class="col-sm-2" style="text-align : center;"><input class="input" type="radio" name="HumeurA" value="Triste">Triste</div>
					<div class="col-sm-2" style="text-align : center;"><input class="input" type="radio" name="HumeurA" value="En pleine forme">En pleine forme</div>
					<div class="col-sm-2" style="text-align : center;"><input class="input" type="radio" name="HumeurA" value="Triste">Triste</div>
				</div>
				
				<div id="cadre2" class="row">
					<div class="col-sm-2" style="text-align : left;">Légende :</div>
					<div class="col-sm-1" style="text-align : right;"></div>
					<div class="col-sm-7" style="text-align : right;"><textarea rows="5" cols="100%" name="LegendeA"></textarea></div>
				</div>	
				
				<div id="cadre2" class="row">
					<div class="col-sm-3" style="text-align : center;"><b>Photo n°1 :</b></div>					
				</div>
				
				<div id="cadre2" class="row">
					<div class="col-sm-3" style="text-align : left;">Sélectionnez la photo n°1 :</div>
					<div class="col-sm-1" style="text-align : center;"></div>					
					<div class="col-sm-2" style="text-align : left;"><input type=file name="image"></div>
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
					<div class="col-sm-2" style="text-align : center;"><input class="input" type="radio" name="Humeur" value="Triste">Triste</div>
				</div>
				
				<div id="cadre2" class="row">
					<div class="col-sm-2" style="text-align : left;">Légende :</div>
					<div class="col-sm-1" style="text-align : right;"></div>
					<div class="col-sm-7" style="text-align : right;"><textarea rows="5" cols="100%" name="image2"></textarea></div>
				</div>	

				<div id="cadre2" class="row">
					<div class="col-sm-3" style="text-align : center;"><b>Photo n°2 :</b></div>					
				</div>
				
				<div id="cadre2" class="row">
					<div class="col-sm-3" style="text-align : left;">Sélectionnez la photo n°2 :</div>
					<div class="col-sm-1" style="text-align : center;"></div>					
					<div class="col-sm-2" style="text-align : left;"><input type=file value="Parcourir2"></div>
				</div>
				
				<div id="cadre2" class="row">
					<div class="col-sm-3" style="text-align : left;">Lieu :</div>
					<div class="col-sm-1" style="text-align : center;"></div>
					<div class="col-sm-1" style="text-align : center;"><input class="input" type="text" name="Lieu2"></div>
				</div>
				
				<div id="cadre2" class="row">
					<div class="col-sm-2" style="text-align : left;">Humeur :</div>
					<div class="col-sm-2" style="text-align : center;"><input class="input" type="radio" name="Humeur2" value="Aucun">Aucun</div>
					<div class="col-sm-2" style="text-align : center;"><input class="input" type="radio" name="Humeur2" value="Heureux">Heureux</div>
					<div class="col-sm-2" style="text-align : center;"><input class="input" type="radio" name="Humeur2" value="Triste">Triste</div>
					<div class="col-sm-2" style="text-align : center;"><input class="input" type="radio" name="Humeur2" value="En pleine forme">En pleine forme</div>
					<div class="col-sm-2" style="text-align : center;"><input class="input" type="radio" name="Humeur2" value="Triste">Triste</div>
				</div>
				
				<div id="cadre2" class="row">
					<div class="col-sm-2" style="text-align : left;">Légende :</div>
					<div class="col-sm-1" style="text-align : right;"></div>
					<div class="col-sm-7" style="text-align : right;"><textarea rows="5" cols="100%" name="legende2"></textarea></div>
				</div>

				
				<div id="cadre2" class="row">
					<div class="col-sm-3" style="text-align : center;"><b>Photo n°3 :</b></div>					
				</div>
				
				<div id="cadre2" class="row">
					<div class="col-sm-3" style="text-align : left;">Sélectionnez la photo n°3 :</div>
					<div class="col-sm-1" style="text-align : center;"></div>					
					<div class="col-sm-2" style="text-align : left;"><input type=file name="image3"></div>
				</div>
				
				<div id="cadre2" class="row">
					<div class="col-sm-3" style="text-align : left;">Lieu :</div>
					<div class="col-sm-1" style="text-align : center;"></div>
					<div class="col-sm-1" style="text-align : center;"><input class="input" type="text" name="Lieu3"></div>
				</div>
				
				<div id="cadre2" class="row">
					<div class="col-sm-2" style="text-align : left;">Humeur :</div>
					<div class="col-sm-2" style="text-align : center;"><input class="input" type="radio" name="Humeur3" value="Aucun">Aucun</div>
					<div class="col-sm-2" style="text-align : center;"><input class="input" type="radio" name="Humeur3" value="Heureux">Heureux</div>
					<div class="col-sm-2" style="text-align : center;"><input class="input" type="radio" name="Humeur3" value="Triste">Triste</div>
					<div class="col-sm-2" style="text-align : center;"><input class="input" type="radio" name="Humeur3" value="En pleine forme">En pleine forme</div>
					<div class="col-sm-2" style="text-align : center;"><input class="input" type="radio" name="Humeur3" value="Triste">Triste</div>
				</div>
				
				<div id="cadre2" class="row">
					<div class="col-sm-2" style="text-align : left;">Légende :</div>
					<div class="col-sm-1" style="text-align : right;"></div>
					<div class="col-sm-7" style="text-align : right;"><textarea rows="5" cols="100%" name="legende3"></textarea></div>
				</div>
				
				<div id="cadre2" class="row">
					<div class="col-sm-3" style="text-align : center;"><b>Photo n°4 :</b></div>					
				</div>
				
				<div id="cadre2" class="row">
					<div class="col-sm-3" style="text-align : left;">Sélectionnez la photo n°4 :</div>
					<div class="col-sm-1" style="text-align : center;"></div>					
					<div class="col-sm-2" style="text-align : left;"><input type=file name="image4"></div>
				</div>
				
				<div id="cadre2" class="row">
					<div class="col-sm-3" style="text-align : left;">Lieu :</div>
					<div class="col-sm-1" style="text-align : center;"></div>
					<div class="col-sm-1" style="text-align : center;"><input class="input" type="text" name="Lieu4"></div>
				</div>
				
				<div id="cadre2" class="row">
					<div class="col-sm-2" style="text-align : left;">Humeur :</div>
					<div class="col-sm-2" style="text-align : center;"><input class="input" type="radio" name="Humeur4" value="Aucun">Aucun</div>
					<div class="col-sm-2" style="text-align : center;"><input class="input" type="radio" name="Humeur4" value="Heureux">Heureux</div>
					<div class="col-sm-2" style="text-align : center;"><input class="input" type="radio" name="Humeur4" value="Triste">Triste</div>
					<div class="col-sm-2" style="text-align : center;"><input class="input" type="radio" name="Humeur4" value="En pleine forme">En pleine forme</div>
					<div class="col-sm-2" style="text-align : center;"><input class="input" type="radio" name="Humeur4" value="Triste">Triste</div>
				</div>
				
				<div id="cadre2" class="row">
					<div class="col-sm-2" style="text-align : left;">Légende :</div>
					<div class="col-sm-1" style="text-align : right;"></div>
					<div class="col-sm-7" style="text-align : right;"><textarea rows="5" cols="100%" name="legende4"></textarea></div>
				</div>
				
				<div id="cadre2" class="row">
					<div class="col-sm-3" style="text-align : center;"><b>Photo n°5 :</b></div>					
				</div>
				
				<div id="cadre2" class="row">
					<div class="col-sm-3" style="text-align : left;">Sélectionnez la photo n°5 :</div>
					<div class="col-sm-1" style="text-align : center;"></div>					
					<div class="col-sm-2" style="text-align : left;"><input type=file name="image5"></div>
				</div>
				
				<div id="cadre2" class="row">
					<div class="col-sm-3" style="text-align : left;">Lieu :</div>
					<div class="col-sm-1" style="text-align : center;"></div>
					<div class="col-sm-1" style="text-align : center;"><input class="input" type="text" name="Lieu5"></div>
				</div>
				
				<div id="cadre2" class="row">
					<div class="col-sm-2" style="text-align : left;">Humeur :</div>
					<div class="col-sm-2" style="text-align : center;"><input class="input" type="radio" name="Humeur5" value="Aucun">Aucun</div>
					<div class="col-sm-2" style="text-align : center;"><input class="input" type="radio" name="Humeur5" value="Heureux">Heureux</div>
					<div class="col-sm-2" style="text-align : center;"><input class="input" type="radio" name="Humeur5" value="Triste">Triste</div>
					<div class="col-sm-2" style="text-align : center;"><input class="input" type="radio" name="Humeur5" value="En pleine forme">En pleine forme</div>
					<div class="col-sm-2" style="text-align : center;"><input class="input" type="radio" name="Humeur5" value="Triste">Triste</div>
				</div>
				
				<div id="cadre2" class="row">
					<div class="col-sm-2" style="text-align : left;">Légende :</div>
					<div class="col-sm-1" style="text-align : right;"></div>
					<div class="col-sm-7" style="text-align : right;"><textarea rows="5" cols="100%" name="legende5"></textarea></div>
				</div>
				
				<div id="cadre4" class="row">
					<div class="col-sm-9" style="text-align : center;"></div>
					<div class="col-sm-2" style="text-align : right;"><input type="submit" name="Valider" value="Valider"></div>					
				</div>
				
			</div>
		</div>
		</form>
	</body>
</html>