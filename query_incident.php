<!DOCTYPE html>
<html><head><title>carnet d'adresse</title><meta charset="utf-8" /></head>

<body>
<?php

//connexion à la database projet
 	$db = new PDO('mysql:host=127.0.0.1','root','');
	$res= $db->exec('create database if not exists projet');
	$db = new PDO('mysql:host=127.0.0.1;dbname=projet','root','');
	//$db->exec('DROP TABLE contract');

	// créer la table incident si elle n'exsite pas
    $res= $db->exec('create table if not exists incident(
   id_incident int NOT NULL auto_increment primary key,
   id_materiel int NOT NULL,
   description varchar(300) NOT NULL,
   etat int not null)');
	$success = false;
 // récuperer les champs rensigner par l'utilisateur pour la création d'un nouveau incident
	$materiel  = isset($_GET['materiel'])    ? $_GET['materiel']    : null;
	$description = isset($_GET['description']) ? $_GET['description'] : null;
	$etat  = isset($_GET['etat'])    ? $_GET['etat']    : null;


	// insérer dans la table incident les données récuperées
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