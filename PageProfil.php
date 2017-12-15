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
	
	
	//recupere les photos du comptes 
	$sql2="SELECT * FROM `photo` WHERE `Email` LIKE '$Email'";
	$result2 = mysqli_query($db_handle,$sql2);
	if (!$result2) 
	{
		echo "Could not successfully run query ($sql) from DB: " . mysql_error();
		exit;
	}
	$i=0;
	$storeArray = Array();
	while ($row2= mysqli_fetch_array($result2, MYSQL_ASSOC))
	{
		$storeArray[$i]['image'] = $row2['image'];
		$storeArray[$i]['Lieux'] = $row2['Lieux'];
		$storeArray[$i]['Date']=$row2['Date'];
		$storeArray[$i]['legende']=$row2['legende'];
		$storeArray[$i]['feeling']=$row2['feeling'];
			
		$i++;
	}	
	$i--;	
	
	//recupere l'album
	
	$sql3="SELECT * FROM `photo` WHERE `Email` LIKE '$Email' ORDER BY `ID` DESC LIMIT 1";
	$result3 = mysqli_query($db_handle,$sql3);
	$lastID=$row3['ID'];

	$result3 = mysqli_query($db_handle,$sql3);
	$row3= mysqli_fetch_assoc($result3);
	
	$legende3=$row3['legende'];
	$date3=$row3['Date'];
	$feel3=$row3['feeling'];
	$lieu3=$row3['Lieux'];
	$image3=$row3['image'];
	
	
	$pathP = '"images/'.$storeArray[$i]['image'].'"';
	$pathP3 = '"images/'.$row3['image'].'"';
	
	$_SESSION['cle']=$Email;
	//fermer !bdd
	mysqli_close($db_handle);
	
	function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
	}
?>


<!DOCTYPE>
<html>
	<head>
		<title>Profil</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link href="PageProfil.css" rel="stylesheet" type="text/css" />
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
			<div class="col-sm-1" style="text-align : center;"><input class="boutton" Type="button" Value="Amis" Onclick="window.location.href='ProfilAmi.html'"></div>
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
			<div class="col-sm-2" style="text-align : center;"></div>
			<div class="col-sm-8" style="text-align : center;">
				<div id="titre" class="row">
					<div class="col-sm-1" style="text-align : center;"></div>
					<div class="col-sm-6" style="text-align : center;">Dernière actualité du profil</div>					
				</div>
				<div id="cadre" class="row">
					<div class="col-sm-5" style="text-align : left;">Permis en poche !</div>
					<div class="col-sm-3" style="text-align : center;">
						<div class="row">
							<div class="col-sm-6" style="text-align : left;">Humeur :</div>
							<div class="col-sm-6" style="text-align : left;">Heureux</div>
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
		
		<br>
		<div class="row">
			<div class="col-sm-2" style="text-align : center;"></div>
			<div id="cadre2" class="col-sm-8" style="text-align : center;">
				<div class="row">
					<div class="col-sm-2" style="text-align : center;"><img src=<?php echo $pathP3 ?> alt="cover" width="150" height="100"/></div>
					<div class="col-sm-3" style="text-align : left;">ALBUM PHOTO</div>
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
		
		
		<br>
		
		<div class="row">
			<div class="col-sm-2" style="text-align : center;"></div>
			<div class="col-sm-8" style="text-align : center;">
				<div id="cadre2" class="row">
					<br>
					<div class="col-sm-3" style="text-align : center;"><img src="alive2017.png" alt="imageevent" width="200" height="200"/></div>
					<div class="col-sm-5" style="text-align : center;">
						<div class="row">
							<div class="col-sm-2" style="text-align : left;">EVENT</div>
							<div class="col-sm-3" style="text-align : left;">Nom :</div>
							<div class="col-sm-6" style="text-align : left;">DAFT PUNK ALIVE 2017</div>	
							<br><br>
						</div>
						<div class="row">
							<div class="col-sm-2" style="text-align : left;"></div>
							<div class="col-sm-3" style="text-align : left;">Date :</div>
							<div class="col-sm-6" style="text-align : left;">ETE 2017</div>
							<br>								
						</div>
						<div class="row">
							<br>
							<div class="col-sm-2" style="text-align : left;"></div>
							<div class="col-sm-3" style="text-align : left;">Lieu :</div>
							<div class="col-sm-6" style="text-align : left;">Paris</div>
							<br>
						</div>
						<div class="row">
							<br>
							<div class="col-sm-2" style="text-align : left;"></div>
							<div class="col-sm-3" style="text-align : left;">Heure :</div>
							<div class="col-sm-6" style="text-align : left;">21:00</div>	
							<br>
						</div>
						<div class="row">
							<br>
							<div class="col-sm-2" style="text-align : left;"></div>
							<div class="col-sm-3" style="text-align : left;">Legende :</div>
							<div class="col-sm-6" style="text-align : left;">Du tres tres lourd.</div>
							<br><br><br>
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
		
		<br>
		
		<div class="row">
			<div class="col-sm-2" style="text-align : center;"></div>
			<div  class="col-sm-8" style="text-align : center;">
				<div id="titre" class="row">
					<div class="col-sm-1" style="text-align : center;">PHOTO</div>
					<div class="col-sm-6" style="text-align : center;"><?php echo $lastimage ?></div>					
				</div>
				<div id="cadre" class="row">
					<div class="col-sm-2" style="text-align : center;"><img src=<?php echo $pathP ?> alt="cover" width="150" height="100"/></div>
					<div class="col-sm-3" style="text-align : left;"><?php echo $storeArray[$i]['legende']?></div>
					<div class="col-sm-3" style="text-align : center;">
						<div class="row">
							<div class="col-sm-6" style="text-align : left;">Lieu :</div>
							<div class="col-sm-6" style="text-align : left;"><?php echo $storeArray[$i]['Lieux']?></div>
						</div>
						<div class="row">
							<div class="col-sm-6" style="text-align : left;">Date</div>
							<div class="col-sm-6" style="text-align : left;"><?php echo $storeArray[$i]['Date']?></div>
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
							<div class="col-sm-6" style="text-align : left;"><?php echo $storeArray[$i]['feeling']?></div>
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