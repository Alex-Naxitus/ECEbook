
<?php
	if(isset($_POST['Valider']))
	{
		// initialisation BDD
		define('DB_SERVER', 'localhost');
		define('DB_USER', 'root');
		define('DB_PASS','');
		
		$database = "site";
		
		$db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
		$db_found = mysqli_select_db($db_handle, $database);

		//recuperer les valeur 
		$nom   = isset($_POST["Nom"])?$_POST["Nom"] : "";
		$prenom    = isset($_POST["Prenom"])?$_POST["Prenom"] : "";
		$mail  = isset($_POST["email"])?$_POST["email"] : "";
		$pseudo   = isset($_POST["Pseudo"])?$_POST["Pseudo"] : "";
		$naissance   = isset($_POST["Naissance"])?$_POST["Naissance"] : "";
		$HM = isset($_POST["Sexe"])?$_POST["Sexe"] : "";
		$sexe = 0 ; 
		$verifmail= true;
		if ($HM=="Homme")
		{
			$sexe =1;
		}
		else if($HM=="Femme")
		{
			$sexe=0;
		}
		
		
		$error = "";	
		//verifie si les cases sont remplies 
		if($nom == "") { $error .= "la case Nom est vide "; }
		if($prenom == "") { $error .= "la case Prenom est vide ";}
		if($mail == "") { $error .= "la case e-mail est vide ";}
		if($pseudo == "") { $error .= "la case pseudo est vide ";}
		if($naissance == "") { $error .= "la case naissance est vide ";}
		if($sexe== "") {$error .= "veuillez choisir homme ou femme  ";}
		
		//verifier si le mail n'est pas deja inscrit
		$result = mysqli_query($db_handle,"SELECT Email FROM users");
		$storeArray = Array();
		while ($row = mysqli_fetch_array($result, MYSQL_ASSOC))
		{
			$storeArray[] =  $row['Email'];  
		}
		for ( $i = 0; $i<sizeof($storeArray);$i++)
		{
			if($storeArray[$i]==$mail)
			{
				$verifmail = false;
			}
		}
		

		//si les champs ne sont pas vide et que le mail n'est pas deja inscrit dans la bdd
		if( $verifmail && $error=="" )
		{
			if ($db_found)
			{
				$SQL = "INSERT INTO users (`Nom`, `Prenom`, `Email`, `pseudo`, `date`, `sexe`) VALUES
				('$nom', '$prenom', '$mail', '$pseudo', '$naissance', '$sexe')";
				$result = mysqli_query($db_handle, $SQL);
				phpAlert("bienvenue!");
			}
		}
		//sinon
		else 
		{
			if(!$verifmail)
			{
				//afficher les erreurs et recharger la page
				phpAlert("cette adresse e-mail : ".$mail." est deja utilise et " . $error);
				header('Refresh: 0; url=http://localhost/prjj/Acceuil.php');
			}
			else
			{	
				//afficher les erreurs et recharger la page
				phpAlert( $error);
				header('Refresh: 0; url=http://localhost/prjj/Acceuil.php');
			}
		}
		mysqli_close($db_handle);
	}
	?>
	
	
	
	
<?php
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}
?>




<!DOCTYPE html>
<html>

	<head>
		<title>ECE'sBooK</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link href="Acceuil.css" rel="stylesheet" type="text/css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
	</head>
	
	<body>
		<nav class="navbar navbar-fixed-top">
			<div class="container-fluid">
				<div class="col-sm-2" style="text-align : center;"></div>
				<div class="col-sm-2" style="text-align : center;">
					<ul class="nav navbar-nav">
						<li> <a id="titre" href="#">ECE'sBooK</a> </li>
					</ul>
				</div>
				<div class="col-sm-2" style="text-align : right"></div>					
				<div class="col-sm-6" style="text-align : left">
					<form class="connec" action="connect.php" method="post">								
						<a style="color:black;">E-mail :</a>
						<input class="input" type="text" name="Email">
						<a style="color:black;">Pseudo :</a>
						<input class="input type="text" name="Pseudo">
						<input Type="submit" name="valider" value="Valider !" ><br>			
					</form>
				</div>
			</div>
		</nav>		
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		
		<form class="row" action="acceuil.php" method="post">
			<div class="col-sm-1" style="text-align : center;"></div>
			<div id="form" class="col-sm-5" style="text-align : left;">
				<br>
				<div class="row">
					<div class="col-sm-12" style="text-align : left;">Inscription :</div>					
				</div>
				<br><br>
				<div class="row">
					<div class="col-sm-6" style="text-align : left;">Nom :</div>
					<div class="col-sm-6" style="text-align : left;"><input class="input" id="input" type="text" name="Nom"></div>					
				</div>
				<br>
				<div class="row">
					<div class="col-sm-6" style="text-align : left;">Prenom :</div>
					<div class="col-sm-6" style="text-align : left;"><input class="input" type="text" name="Prenom"></div>					
				</div>
				<br>
				<div class="row">
					<div class="col-sm-6" style="text-align : left;">E-mail :</div>
					<div class="col-sm-6" style="text-align : left;"><input class="input" type="text" name="email"></div>					
				</div>
				<br>
				<div class="row">
					<div class="col-sm-6" style="text-align : left;">Pseudo :</div>
					<div class="col-sm-6" style="text-align : left;"><input class="input" type="text" name="Pseudo"></div>					
				</div>
				<br>
				<div class="row">
					<div class="col-sm-6" style="text-align : left;">Date de naissance :</div>
					<div class="col-sm-6" style="text-align : left;"><input type="date" name="Naissance"></div>					
				</div>
				<br>
				<div class="row">
					<div class="col-sm-6" style="text-align : left;">Sexe :</div>
					<div class="col-sm-6" style="text-align : left;">
					<input class="input" type="radio" name="Sexe" value="Femme">Femme
					<input class="input" type="radio" name="Sexe" value="Homme">Homme
					</div>
				</div>	
				<br>
				<div class="row">
				<div class="col-sm-10" style="text-align : right;"></div>
				<input type="submit" name="Valider" value="Valider">
				</div>
				<br>
			</div>
		</form>
	</body>	
	
</html>