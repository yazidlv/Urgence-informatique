<!DOCTYPE html>
<html><head><title>carnet d'adresse</title><meta charset="utf-8" /></head>
<style>

td{
text-align:center;
   border-radius: 0px 10px 0px 10px;
   border-style:solid;
border-color:#00BFFF;
}
</style>
<body>


<?php
/**
  * ce fichier permet de vérifier si l'urilisateur possède un compte.
  * je ne l'utilise plus pour l'instant  j'essaye d'intgrer la solution du prof dans le partiel avec du javascript et json
  */
  
  // connexion à mysql 
	$db = new PDO('mysql:host=127.0.0.1','root','');
	// créer la database projet si elle n'existe pas 
	$res= $db->exec('create database if not exists projet');
	// ce connecter à la database projet.
	$db = new PDO('mysql:host=127.0.0.1;dbname=projet','root','');

   /*$res= $db->exec('create table if not exists users(
   id int NOT NULL auto_increment primary key,
   nom varchar(30) NOT NULL,
   prenom varchar(30) NOT NULL,
   mail varchar(50) not null,
   password varchar(40),
   role int (2) not null,)');*/

// récuperer le login et mots de passe rensigner par l'utilisateur dans le fichier index.php
	$login= isset($_GET['login']) ? $_GET['login'] : null;
	$mp= isset($_GET['password']) ? $_GET['password'] : null;
	
// variable $query reçoit la requête SQL pour vérifier dans la tables users si l'utilisateur est enregistré.
   $query= "select id, mail, password from users where mail='$login' and password='$mp'";
   
 //exécuter la requête 
   $res=$db->query($query);
  
  
// reprendre le fichier vérif regarder comment le rpof a utiliser dans le fichier partiel pour pouvoir faire pareille

   if($res)
   { 
   
   //je ne rentre pas dans le foreach
		foreach($res as $row)
		{  
		echo"hhhhhhhhhhhhhhhhhhhhhhhh";
			if ($row['id']!== 0)
	        {
			echo"n,,klm,lo;kl$";
				 include("principal.php");
		    }                     
			else
			{
				echo '<tr><a name="retour" onclick="document.location=\'index.php?\' ;" /><img src="image/retour.png"/></a></tr><br>';
				echo" erreur identifacation";
			}
		}
	}

?>
</body>
</html>
