<?php

define('DB_SERVER', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS','');
	
	$dbname = "site";
	
	$db_handle = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
	$db_found = mysqli_select_db($db_handle, $dbname);

$SQL = "CREATE TABLE `site`.`Comment` ( `ID` INT(4) NOT NULL AUTO_INCREMENT , `Nom` VARCHAR(200) NOT NULL , `Texte1` VARCHAR(5000) NOT NULL , PRIMARY KEY (`ID`(4), `Nom`(200))) ENGINE = InnoDB;
ALTER TABLE `Comment` ADD FOREIGN KEY (`Nom`) REFERENCES `site`.`users`(`Nom`) ON DELETE RESTRICT ON UPDATE RESTRICT";
$result = mysqli_query($db_handle, $SQL);

$SQL3 = "CREATE TABLE `site`.`Conversation` ( `ID` INT(4) NOT NULL AUTO_INCREMENT, PRIMARY KEY (`ID`(4))) ENGINE = InnoDB";
$result3 = mysqli_query($db_handle, $SQL3);

$SQL2 = "CREATE TABLE `site`.`Reaction` ( `ID` INT(4) NOT NULL AUTO_INCREMENT , `Nom` VARCHAR(200) NOT NULL , `Texte1` VARCHAR(5000) NOT NULL , PRIMARY KEY (`ID`(4), `Nom`(200))) ENGINE = InnoDB;
ALTER TABLE `Reaction` ADD FOREIGN KEY (`Nom`) REFERENCES `site`.`users`(`Nom`) ON DELETE RESTRICT ON UPDATE RESTRICT";
$result2 = mysqli_query($db_handle, $SQL2);



?>