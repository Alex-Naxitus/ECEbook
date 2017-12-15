<?php
	session_start();
	
	$mail= isset($_POST["Email"])?$_POST["Email"] : "";
	$pseudo = isset ($_POST["Pseudo"])?$_POST["Pseudo"] : "";
	$connexionverif = false ; 
	// initialisation BDD
	define('DB_SERVER', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS',''); /* A modifier pour Alex */
	
	$database = "site";
	
	$db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
	$db_found = mysqli_select_db($db_handle, $database);
	
	
	
	$result = mysqli_query($db_handle,"SELECT Email,pseudo FROM users");
	
	$i =0;
	$storeArray = Array();
	while ($row = mysqli_fetch_array($result, MYSQL_ASSOC))
	{
		$storeArray[$i]['Email'] = $row['Email'];
		$storeArray[$i]['pseudo'] = $row['pseudo'];
		$i++;
		
	}
	mysqli_close($db_handle);
	for ($i=0 ; $i<sizeof($storeArray);$i++)
	{
		if ($mail == $storeArray[$i]['Email'] && $pseudo == $storeArray[$i]['pseudo'])
		{
			$connexionverif = true ;
		}
	}
	
	if ($connexionverif)
	{	
		$_SESSION['Email'] = $mail;
		header ('Refresh: 0; url=http://localhost/prj/PageProfil.php');
	}
	else 
	{
		phpAlert("L'adresse mail ou votre pseudo sont erronne veuillez ressaisir");
		header ('Refresh: 0; url=http://localhost/prj/Acceuil.html');
	}
	
	
	?>
	
	<?php
function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}
?>