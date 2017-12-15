<?php
// initialisation BDD
	define('DB_SERVER', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS','');
	
	$dbname = "site";
	
	$db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
	$db_found = mysqli_select_db($db_handle, $dbname);
	
	
$SQL = "CREATE TABLE `site`.`users` ( `Nom` VARCHAR(200) NOT NULL , `Prenom` VARCHAR(200) 
NOT NULL , `Email` VARCHAR(200) NOT NULL , `pseudo` VARCHAR(200) NOT NULL , `date` DATE NOT NULL ,
 `sexe` BOOLEAN NOT NULL, PRIMARY KEY (`Nom`,`Email`) )ENGINE = INNODB";
 $result = mysqli_query($db_handle, $SQL);
 
$SQL2 = "CREATE TABLE `site`.`Photo` ( `ID` INT(11) NOT NULL AUTO_INCREMENT 
, `Lieux` VARCHAR(200) NOT NULL , `Date` DATE NOT NULL , `Heure` TIME NOT NULL ,
 `feeling` VARCHAR(200) NOT NULL , `activite` TINYTEXT NOT NULL ,
 `accesibilite` BOOLEAN NOT NULL , 
`legende` TINYTEXT NOT NULL, PRIMARY KEY (`ID`)) ENGINE = INNODB";
$result2 = mysqli_query($db_handle, $SQL2);

$SQL3 = "CREATE TABLE `site`.`Video` ( `ID` INT(11) NOT NULL AUTO_INCREMENT 
, `Lieux` VARCHAR(200) NOT NULL , `Date` DATE NOT NULL , `Heure` TIME NOT NULL ,
 `feeling` VARCHAR(200) NOT NULL , `activite` TINYTEXT NOT NULL ,
 `accesibilite` BOOLEAN NOT NULL , 
`legende` TINYTEXT NOT NULL, PRIMARY KEY (`ID`)) ENGINE = INNODB";
$result3 = mysqli_query($db_handle, $SQL3);

$SQL4 = "CREATE TABLE `site`.`Event` ( `ID` INT(11) NOT NULL AUTO_INCREMENT ,
 `lieux` VARCHAR(200) NOT NULL , `date` DATE NOT NULL ,
 `heure` TIME NOT NULL , `legende` TINYTEXT NOT NULL, PRIMARY KEY (`ID`) ) ENGINE = INNODB";
 $result4 = mysqli_query($db_handle, $SQL4);
 
 ?>