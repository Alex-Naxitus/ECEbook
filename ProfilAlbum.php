<?php
//recuprer l'email pour savoir quel est l'user
	session_start();
	$Email = $_SESSION['Email'];
	$database;
	$db_handle;
	$db_found;
	$sql;
	$result;
	$row;
	$ppPath;
	include 'connexion user.php';
	
	

	
	//recupere les albums
	
	$sql3="SELECT * FROM `photo` WHERE `Email` LIKE '$Email' ORDER BY `ID` DESC LIMIT 1";
	$result3 = mysqli_query($db_handle,$sql3);
	$row3= mysqli_fetch_assoc($result3);
	$lastID=$row3['ID'];
	
	$legende3=$row3['legende'];
	$date3=$row3['Date'];
	$feel3=$row3['feeling'];
	$lieu3=$row3['Lieux'];
	$image3=$row3['image'];
	
	$pathP3 = '"images/'.$row3['image'].'"';
	
	$Id2=$row3['ID']-1;
	
	$sql2="SELECT * FROM `photo` WHERE 
	`Email` LIKE '$Email' AND `ID` LIKE '$Id2' ORDER BY `ID` DESC LIMIT 1";
	
	$result2 = mysqli_query($db_handle,$sql2);
	$row2= mysqli_fetch_assoc($result2);
	$lastID2=$row2['ID'];

	
	
	$legende2=$row2['legende'];
	$date2=$row2['Date'];
	$feel2=$row2['feeling'];
	$lieu2=$row2['Lieux'];
	$image2=$row2['image'];
	
	$pathP2 = '"images/'.$row2['image'].'"';
	
	
	
	
	$_SESSION['cle']=$Email;
	//fermer !bdd
	mysqli_close($db_handle);
	
	function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
	}






?>
<html>
	<head>
		<title>Albums</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link href="ProfilAlbum.css" rel="stylesheet" type="text/css" />
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
			<div class="col-sm-1" style="text-align : center;"><input id="marqueur" class="boutton" Type="button" Value="Albums" Onclick="window.location.href='ProfilAlbum.html'"></div>
			<div class="col-sm-1" style="text-align : center;"></div>
			<div class="col-sm-1" style="text-align : center;"><input class="boutton" Type="button" Value="Photos" Onclick="window.location.href='ProfilPhoto.html'"></div>			
			<div class="col-sm-2" style="text-align : center;"><a href="PageProfil.php"><img id="pp" src=<?php echo $ppPath ?> class="img-circle" alt="cover" width="155" height="155"/></a></div>			
			<div class="col-sm-1" style="text-align : center;"><input class="boutton" Type="button" Value="A propos" Onclick="window.location.href='ProfilPropos.html'"></div>
			<div class="col-sm-1" style="text-align : center;"></div>
			<div class="col-sm-1" style="text-align : center;"><input class="boutton" Type="button" Value="Amis" Onclick="window.location.href='ProfilAmi.html'"></div>
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
			<div class="col-sm-1" style="text-align : left;"><input class="boutton2" Type="button" Value="Publier" Onclick="window.location.href='ProfilPublier.html'"></div>
		</div>
		
		<hr>
		
		<br><br><br>
		
		<div class="row">
			<div class="col-sm-2" style="text-align : center;"></div>
			<div  class="col-sm-8" style="text-align : center;">
				<div id="titre" class="row">
					<div class="col-sm-1" style="text-align : center;"></div>
					<div class="col-sm-6" style="text-align : center;"></div>					
				</div>
				<div id="cadre" class="row">
					<div class="col-sm-2" style="text-align : center;"><img src=<?php echo $pathP3 ?> alt="cover" width="150" height="100"/></div>
					<div class="col-sm-3" style="text-align : left;"><?php echo $legende3 ?></div>
					<div class="col-sm-3" style="text-align : center;">
						<div class="row">
							<div class="col-sm-6" style="text-align : left;">Lieu :</div>
							<div class="col-sm-6" style="text-align : left;"><?php echo $lieu3 ?></div>
						</div>
						<div class="row">
							<div class="col-sm-6" style="text-align : left;">Date</div>
							<div class="col-sm-6" style="text-align : left;"><?php echo $date3 ?></div>
						</div>
						<div class="row">
							<div class="col-sm-6" style="text-align : left;">"J'aime !":</div>
							<div class="col-sm-6" style="text-align : left;">1</div>
						</div>
						<div class="row">
							<div class="col-sm-6" style="text-align : left;">"J'adore"</div>
							<div class="col-sm-6" style="text-align : left;">0</div>
						</div>
						<div class="row">
							<div class="col-sm-6" style="text-align : left;">"LOL !"</div>
							<div class="col-sm-6" style="text-align : left;">1</div>
						</div>
						<div class="row">
							<div class="col-sm-6" style="text-align : left;">Humeur :</div>
							<div class="col-sm-6" style="text-align : left;"><?php echo $feel3 ?></div>
						</div>
					</div>
					<div class="col-sm-4" style="text-align : center;">
						<div class="row" style="text-align : center;">
							<div class="col-sm-4" style="text-align : center;"></div>
							<div id="commentaire" class="col-sm-4" style="text-align : center;">Commentaires</div>
							<div class="col-sm-4" style="text-align : center;"></div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-4" style="text-align : center;">
								<input class="input" type="radio" name="Sexe" value="Jaime">J'aime !							
							</div>
							<div class="col-sm-4" style="text-align : center;">
								<input class="input" type="radio" name="Sexe" value="Jadore">J'adore !							
							</div>
							<div class="col-sm-4" style="text-align : center;">
								<input class="input" type="radio" name="Sexe" value="Lol">Lol !
							</div>
						</div>
					</div>					
				</div>
			</div>
		</div>
		
		<br><br>
		
		<div class="row">
			<div class="col-sm-2" style="text-align : center;"></div>
			<div class="col-sm-8" style="text-align : center;">
				<div id="titre" class="row">
					<div class="col-sm-1" style="text-align : center;"></div>
					<div class="col-sm-6" style="text-align : center;"></div>					
				</div>
				<div id="cadre" class="row">
					<div class="col-sm-2" style="text-align : center;"><img src=<?php echo $pathP2 ?> alt="cover" width="150" height="100"/></div>
					<div class="col-sm-3" style="text-align : left;"> <?php echo $legende2 ?></div>
					<div class="col-sm-3" style="text-align : center;">
						<div class="row">
							<div class="col-sm-6" style="text-align : left;">Lieu :</div>
							<div class="col-sm-6" style="text-align : left;"><?php echo $lieu3 ?></div>
						</div>
						<div class="row">
							<div class="col-sm-6" style="text-align : left;">Date</div>
							<div class="col-sm-6" style="text-align : left;"><?php echo $date3 ?></div>
						</div>
						<div class="row">
							<div class="col-sm-6" style="text-align : left;">"J'aime !":</div>
							<div class="col-sm-6" style="text-align : left;">3</div>
						</div>
						<div class="row">
							<div class="col-sm-6" style="text-align : left;">"J'adore"</div>
							<div class="col-sm-6" style="text-align : left;">2</div>
						</div>
						<div class="row">
							<div class="col-sm-6" style="text-align : left;">"LOL !"</div>
							<div class="col-sm-6" style="text-align : left;">0</div>
						</div>
						<div class="row">
							<div class="col-sm-6" style="text-align : left;">Humeur :</div>
							<div class="col-sm-6" style="text-align : left;"><?php echo $feel3 ?></div>
						</div>
					</div>
					<div class="col-sm-4" style="text-align : center;">
						<div class="row" style="text-align : center;">
							<div class="col-sm-4" style="text-align : center;"></div>
							<div id="commentaire" class="col-sm-4" style="text-align : center;">Commentaires</div>
							<div class="col-sm-4" style="text-align : center;"></div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-4" style="text-align : center;">
								<input class="input" type="radio" name="Sexe" value="Jaime">J'aime !							
							</div>
							<div class="col-sm-4" style="text-align : center;">
								<input class="input" type="radio" name="Sexe" value="Jadore">J'adore !							
							</div>
							<div class="col-sm-4" style="text-align : center;">
								<input class="input" type="radio" name="Sexe" value="Lol">Lol !
							</div>
						</div>
					</div>					
				</div>
			</div>
		</div>	
		
	</body>
</html>