<?php 

	//recuprer l'email pour savoir quel est l'user
	session_start();
	$Email = $_SESSION['cle'];

	// initialisation BDD
	define('DB_SERVER', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS','');
	$database = "site";
	$db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
	$db_found = mysqli_select_db($db_handle, $database);
	
	if($db_found)
	{
		$sql = "SELECT * FROM `users` WHERE `Email` LIKE '$Email'";
		//effectuer requete
		$result = mysqli_query($db_handle,$sql);
		if (!$result) {
			echo "Could not successfully run query ($sql) from DB: " . mysql_error();
			exit;
		}
		//recupere les donnée d'user
		$row = mysqli_fetch_assoc($result);
		$nom= $row['Nom'];
	}
	
	if(isset($_POST['valider']))
	{
		$target = "images/".basename($_FILES['image']['name']);
		
		$imPath = '"'.$target.'"';
		
		$image = $_FILES['image']['name'];
		$date =date('Y-m-d');
		$time = date('H:i:s');
		$sql = "INSERT INTO `photo` (`ID`, `image`, `Lieux`, `Date`, `Heure`, `feeling`, `activite`, `accesibilite`, `legende`) 
		VALUES (NULL, '$image', '', '$date', '$time', '', '', '1', '');";
		$sql2= "UPDATE `users` SET `PP` = '$image' WHERE `users`.`Nom` = '$nom' AND `users`.`Email` = '$Email'";
		mysqli_query($db_handle, $sql);
		mysqli_query($db_handle, $sql2);

		if (move_uploaded_file($_FILES['image']['tmp_name'],$target))
		{
			
		}else
		{
			$msg = "There was a problem uploading image";
		}
	}
	else
	{
		$imPath='"images/PPdefault"';
	}
	mysqli_close($db_handle);
	?>
	
	
	<!DOCTYPE>
<html>
	<head>
		<title>Nouveau Post</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link href="NewPost.css" rel="stylesheet" type="text/css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
	</head>
	
	<body>
	<br><br><br>
	<div class="row">
		<div class="col-sm-2" style="text-align : left;"></div>
		<div class="col-sm-4" style="text-align : left;">Humeur :</div>
		<div class="col-sm-4" style="text-align : left;">
			<input class="input" type="radio" name="Humeur" value="Auncun">Aucun
			<input class="input" type="radio" name="Humeur" value="Heureux">Heureux
			<input class="input" type="radio" name="Humeur" value="Femme">Triste
			<input class="input" type="radio" name="Humeur" value="Femme">En pleine forme
			<input class="input" type="radio" name="Humeur" value="Femme">Fatigué
		</div>
	</div>
	
	<form class="row" action="post.php" method="post" enctype="multipart/form-data"> 
		<br>
		<div class="row">
			<div class="col-sm-2" style="text-align : left;"></div>
			<div class="col-sm-4" style="text-align : left;"><input Type="submit" name="valider" value="Valider !"></div>
			<div class="col-sm-4" style="text-align : left"><input type="file" name="image"></div>
		</div>
		<br>
		<br>
		<div class="row">
			<div class="col-sm-2" style="text-align : left"></div>
			<div class="col-sm-4" style="text-align : left;">Legende<textarea name="legende" rows="4" cols="50"></textarea></div>
			<div class="col-sm-4" style="text-align : left"><img id="pp" src=<?php echo $imPath ?> alt="cover" width="450" height="300"/></div>
		</div>
		<br>	
	</form>
	</body>
</html>
