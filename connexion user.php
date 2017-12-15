<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS','mysql'); /* A modifier pour Alex */

$database = "site";
$db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
$db_found = mysqli_select_db($db_handle, $database);
//verif bonne BDD
if($db_found)
{
	//effectuer requete
	
	$sql = "SELECT * FROM `users` WHERE `Email` LIKE '$Email'";
	$result = mysqli_query($db_handle,$sql);
	if (!$result) {
		echo "Could not successfully run query ($sql) from DB: " . mysql_error();
		exit;
	}
	//recupere les donnée d'user
	$row = mysqli_fetch_assoc($result);
}
if ($row['PP']!= NULL ) 
$ppPath= '"images/'.$row['PP'].'"';
//sinon foto par defaut
else
$ppPath='"images/PPdefault"';
?>