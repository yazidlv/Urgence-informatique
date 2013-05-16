<!DOCTYPE html>
<html><head><title>carnet d'adresse</title><meta charset="utf-8" /></head>

<body>
<?php

 	$db = new PDO('mysql:host=127.0.0.1','root','');
	$res= $db->exec('create database if not exists projet');
	$db = new PDO('mysql:host=127.0.0.1;dbname=projet','root','');
	//$db->exec('DROP TABLE contract');
	
 $res= $db->exec('create table if not exists role(
   id_role int NOT NULL auto_increment primary key,
   designation varchar(50) NOT NULL');
   
	$success = false;

	$materiel  = isset($_GET['designation'])    ? $_GET['designation']    : null;
	$description = isset($_GET['nom']) ? $_GET['nom'] : null;
	$etat  = isset($_GET['contrat'])    ? $_GET['contrat']    : null;


	/**
	je ne sais pas comment gérér les droit de chaque rôle avec les coche
	  */
	$res= $db->exec("INSERT INTO incident (id_materiel, description, etat) VALUES ('". $materiel."', '".$description."', '".$etat."')");
	echo '<a name="retour" onclick="document.location=\'incident.php?\' ;" /><img src="image/retour.png"/></a><br>';

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