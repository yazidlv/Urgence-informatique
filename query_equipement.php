<!DOCTYPE html>
<html><head><title>carnet d'adresse</title><meta charset="utf-8" /></head>

<body>
<?php

 	$db = new PDO('mysql:host=127.0.0.1','root','');
	$res= $db->exec('create database if not exists projet');
	$db = new PDO('mysql:host=127.0.0.1;dbname=projet','root','');
	//$db->exec('DROP TABLE contract');


  $res= $db->exec('create table if not exists materiel(
   id_mat int NOT NULL auto_increment primary key,
   reference varchar(50) NOT NULL,
   nom varchar(30) NOT NULL,
   id_contrat int (3) not null)');
	$success = false;

	$reference   = isset($_GET['reference'])    ? $_GET['reference']    : null;
	$nom = isset($_GET['nom']) ? $_GET['nom'] : null;
	$contrat  = isset($_GET['contrat'])    ? $_GET['contrat']    : null;


	
	$res= $db->exec("INSERT INTO materiel (reference, nom, id_contrat) VALUES ('". $reference."', '".$nom."', '".$contrat."')");
	echo '<a name="retour" onclick="document.location=\'equipement.php?\' ;" /><img src="image/retour.png"/></a><br>';

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