<!DOCTYPE html>
<html><head><title>carnet d'adresse</title><meta charset="utf-8" /></head>

<body>
<?php

 	$db = new PDO('mysql:host=127.0.0.1','root','');
	$res= $db->exec('create database if not exists projet');
	$db = new PDO('mysql:host=127.0.0.1;dbname=projet','root','');
	//$db->exec('DROP TABLE carnet');


  
 $res= $db->exec('create table if not exists users(
   id int NOT NULL auto_increment primary key,
   nom varchar(30) NOT NULL,
   prenom varchar(30) NOT NULL,
   mail varchar(50) not null,
   password varchar(40),
   role int (2) not null,
   id_incident int,
   foreign key users(id_incident) references  incident(id_incident),
   foreign key users(role) references role(id_role))');
	$success = false;

	$nom    = isset($_GET['nom'])    ? $_GET['nom']    : null;
	$prenom = isset($_GET['prenom']) ? $_GET['prenom'] : null;
	$mail   = isset($_GET['mail'])    ? $_GET['mail']    : null;
	$MP = isset($_GET['password'])  ? $_GET['pasword'] : null;	


	$res= $db->exec("INSERT INTO users (nom, prenom, mail, password, role) VALUES ('". $nom."', '".$prenom."', '".$mail."', '".$MP."','2')");
	echo '<a name="retour" onclick="document.location=\'view_user.php?\' ;" /><img src="image/retour.png"/></a><br>';

	if ($res ===1 ) 
	{
		$success = true;
	}
	if (!$success) 
	{
		header("HTTP/1.0 400 Error");
		echo 'Failed.';
	} 
	else 
	{
		echo 'enregistrement Ok.';
	}
	
?>
</body>
</html>