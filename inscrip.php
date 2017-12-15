


<?php
	// initialisation BDD
	define('DB_SERVER', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS','');
	
	$database = "site";
	
	$db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
	$db_found = mysqli_select_db($db_handle, $database);
	
	$sql= "CREATE TABLE `site`.`users` ( `Nom` VARCHAR(200) NOT NULL , `Prenom` VARCHAR(200) 
	NOT NULL , `mail` VARCHAR(200) NOT NULL , `pseudo` VARCHAR(200) NOT NULL , `date` DATE NOT NULL ,
	`sexe` BOOLEAN NOT NULL ) ENGINE = MyISAM;
	Fin de la discussion";
	$result = mysqli_query($db_handle, $sql);


	//recuperer les valeur 
	$nom   = isset($_POST["Nom"])?$_POST["Nom"] : "";
    $prenom    = isset($_POST["Prenom"])?$_POST["Prenom"] : "";
    $mail  = isset($_POST["email"])?$_POST["email"] : "";
    $pseudo   = isset($_POST["Pseudo"])?$_POST["Pseudo"] : "";
	$naissance   = isset($_POST["Naissance"])?$_POST["Naissance"] : "";
	$HM = isset($_POST["Naissance"])?$_POST["Naissance"] : "";
	$sexe = 0 ; 
	if ($HM=="Homme")
	{
		$sexe =1;
	}
	else
	{
		$sexe=0;
	}
	
	//verification valeurs non nul 
	$error = "";	
	
    if($nom == "") { $error .= "La case Nom est vide<br />";}
	if($prenom == "") { $error .= "La case Prenom est vide<br />";}
    if($mail == "") { $error .= "La case e-mail est vide<br />";}
    if($pseudo == "") { $error .= "La case pseudo est vide<br />";}
    if($naissance == "") { $error .= "La case naissance est vide<br />";}
	
	
	//si les champs ne sont pas vide 
	if ($error == "")
		{
        echo "Le formulaire est valide<br/>";
		
		if ($db_found)
			{
				$SQL = "INSERT INTO users (`Nom`, `Prenom`, `mail`, `pseudo`, `date`, `sexe`) VALUES
				('$nom', '$prenom', '$mail', '$pseudo', '$naissance', '$sexe')";
				echo "INSERT INTO users (`Nom`, `Prenom`, `mail`, `pseudo`, `date`, `sexe`) VALUES
				('$nom', '$prenom', '$mail', '$pseudo', '$naissance', '$sexe')";
				$result = mysqli_query($db_handle, $SQL);
			}
    }
	//sinon
    else {
        echo "Erreur : $error";
		if ($db_found)
			{
				$SQL = "INSERT INTO users (`Nom`, `Prenom`, `mail`, `pseudo`, `date`, `sexe`) VALUES
				($nom, '$prenom', '$mail', '$pseudo', '$naissance', '$sexe')";
			}
		
		
    }
	mysqli_close($db_handle);
	?>