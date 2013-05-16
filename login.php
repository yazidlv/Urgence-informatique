<?php
	session_start();
	
	$success = false;
	
	// fichier récuperer du partiel du prof  il récupére les donné rentrer par l'utilisateur et verifie son existance dans la table users
	// cela ne fonctione pas encore
	$db = new PDO('mysql:host=127.0.0.1','root','');
	$res= $db->exec('create database if not exists projet');
	$db = new PDO('mysql:host=127.0.0.1;dbname=projet','root','');

		
	$login= isset($_GET['login']) ? $_GET['login'] : null;
	$mp= isset($_GET['password']) ? $_GET['password'] : null;
	
		
	
			$stmnt = $db->query("SELECT mail,password FROM users WHERE mail ='".$login."'AND password ='".$password."'");
var_dump($stmnt);
			$result = $stmnt->fetch();
			var_dump($resultat);
			if ($result) {
				$success = true;
				$_SESSION["auth_ok"] = 'true';
				$_SESSION["uid"] = $result['uid'];
				$_SESSION["user_name"] = $result['name'];
			}
		
	
	
	// on change le code de retour en cas d'échec
	if (!$success) {
		header("HTTP/1.0 401 erreur identification, veuillez contacter le service RH");
	}
	
	// on utilise login_info.php pour générer la sortie
	include('login_info.php');
?>