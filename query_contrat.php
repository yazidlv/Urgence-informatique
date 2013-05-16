<!DOCTYPE html>
<html><head><title>carnet d'adresse</title><meta charset="utf-8" /></head>

<body>
<?php

 	$db = new PDO('mysql:host=127.0.0.1','root','');
	$res= $db->exec('create database if not exists projet');
	$db = new PDO('mysql:host=127.0.0.1;dbname=projet','root','');
	//$db->exec('DROP TABLE contract');


  
 $res= $db->exec('create table if not exists contract(
   id_contract int NOT NULL auto_increment primary key,
   id_client int NOT NULL,
   start_date date NOT NULL,
   end_date date not null)');
	$success = false;

	$client   = isset($_GET['client'])    ? $_GET['client']    : null;
	$start = isset($_GET['start']) ? $_GET['start'] : null;
	$end   = isset($_GET['end'])    ? $_GET['end']    : null;


	
	$res= $db->exec("INSERT INTO contract (id_client, start_date, end_date) VALUES ('". $client."', '".$start."', '".$end."')");
	echo '<a name="retour" onclick="document.location=\'contrat.php?\' ;" /><img src="image/retour.png"/></a><br>';

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