<!DOCTYPE html>
<html><head><title>carnet d'adresse</title><meta charset="utf-8" />
<style type="text/css">
label{
	display: inline-block;
	width: 80px;
	}
</style>
</head>

<body>
<h1> modification du contact </h1>
<?php

include("select_html.php");


$today = date("F j, Y, H:i");
	
	$db = new PDO('mysql:host=127.0.0.1;dbname=projet','root','');
// récupération  des varables cible.. permettes de savoir qu'il objet il faut modifier. 

   	$cible= isset($_GET['cible']) ? $_GET['cible'] : null;// personnel client
	$cible1= isset($_GET['cible1']) ? $_GET['cible1'] : null;// contrat
	$cible2= isset($_GET['cible2']) ? $_GET['cible2'] : null;// matériel
	$cible3= isset($_GET['cible3']) ? $_GET['cible3'] : null;//incident
	$cible4= isset($_GET['cible4']) ? $_GET['cible4'] : null;// role


	
	echo '<a name="retour" onclick="document.location=\'principal.php?\' ;" /><img src="image/retour.png"/></a><br>';
	//modifier user
	if($cible!=0)
	{
		$query= "select*from users where id='$cible'";
		echo"<table width='0%' cellpadding='5' cellspacing='1' border='0'>"; 
		$res=$db->query($query);
		foreach($res as $row) 
		{ 
	     echo"<tr><td bgcolor='#00BFFF'>".$row['nom']."</td><td bgcolor='#00BFFF'>".$row['prenom']."</td><td bgcolor='#00BFFF'>".$row['mail']."</td><td bgcolor='#00BFFF'>".$row['role']."</td>"; 
		}	 

	echo"<form action='update.php' method='get'>
		<fieldset>
		<div>
		<label for='nom'>Nom</label>
		<input name='nom' type='text' value= ".$row['nom'].">
		</div>
		<div>
		<label for='prenom'>prenom</label>
	    <input name='prenom' type='text' value=".$row['prenom'].">
		</div>
		<div>
		<label for='mail'>Email</label>
		<input name='mail' type='email' value=".$row['mail'].">
		</div>
		<div>
		<label for='tel'>password</label> 
		<input name='password' type='text' value=".$row['password'].">
		</div>
		<div>
		<label for='role'>Rôle</label> 
		<input name='role' type='text' value=".$row['role'].">
		</div>

		<input type='image' src='image/ok.png' style='height:40px; border:solid 1px silver; border-radius:10px;' name='id' value=".$row['id']."></fieldset>
	</form>";
	
	}
	//modifier contrat
	if($cible1!=0)
	{
	 
   

		$query= "select*from contract where id_contract='$cible1'";
		echo"<table width='0%' cellpadding='5' cellspacing='1' border='0'>"; 
		$res=$db->query($query);
		foreach($res as $row) 
		{ 
	     echo"<tr><td bgcolor='#00BFFF'>".$row['id_client']."</td><td bgcolor='#00BFFF'>".$row['start_date']."</td><td bgcolor='#00BFFF'>".$row['end_date']."</td>"; 
		}	 

	echo"<form action='update.php' method='get'>
		<fieldset>
		<div>
		<label for='client'>client</label>
		<input name='client' type='text' value= ".$row['id_client'].">
		</div>
		<div>
		<label for='start'>date départ</label>
	    <input name='start' type='date' value=".$row['start_date'].">
		</div>
		<div>
		<label for='end'>date fin</label>
		<input name='end' type='date' value=".$row['end_date'].">
		</div>
	

		<input type='image' src='image/ok.png' style='height:40px; border:solid 1px silver; border-radius:10px;' name='id1' value=".$row['id_contract']."></fieldset>
		</form>";
	
	}
	// modifier matériel
	if($cible2!=0)
	{
	 
   

		$query= "select*from materiel where id_mat='$cible2'";
		echo"<table width='0%' cellpadding='5' cellspacing='1' border='0'>"; 
		$res=$db->query($query);
		foreach($res as $row) 
		   

   
		{ 
	     echo"<tr><td bgcolor='#00BFFF'>".$row['reference']."</td><td bgcolor='#00BFFF'>".$row['nom']."</td><td bgcolor='#00BFFF'>".$row['id_contrat']."</td>"; 
		}	 

	echo"<form action='update.php' method='get'>
		<fieldset>
		<div>
		<label for='reference'>reference</label>
		<input name='reference' type='text' value= ".$row['reference'].">
		</div>
		<div>
		<label for='nom'>nom</label>
	    <input name='nom' type='text' value=".$row['nom'].">
		</div>
		<div>
		<label for='contrat'>contrat</label>
		<input name='contrat' type='text' value=".$row['id_contrat'].">
		</div>
	

		<input type='image' src='image/ok.png' style='height:40px; border:solid 1px silver; border-radius:10px;' name='id2' value=".$row['id_mat']."></fieldset>
	</form>";
	
	}
	
	//modifier incident
	if($cible3!=0)
	{
	  $sel=new SelectHtml("values[role]");
		$sel->addOptions(array(1=>'nouveau', 2=>'en cours', 3=>'affecté', 4=>'réparé', 5=>'non réparé',6=>'testé', 7=>'annulé', 8=>'livré'));
   

		$query= "select*from incident where id_incident='$cible3'";
		echo"<table width='0%' cellpadding='5' cellspacing='1' border='0'>"; 
		$res=$db->query($query);
		foreach($res as $row) 
		   

  

		{ 
	     echo"<tr><td bgcolor='#00BFFF'>".$row['id_materiel']."</td><td bgcolor='#00BFFF'>".$row['description']."</td><td bgcolor='#00BFFF'>".$row['etat']."</td>"; 
		}	 
// je n'arrive pas à remonté la discription ??????,
	echo"<form action='update.php' method='get'>
		<fieldset>
		<div>
		<label for='materiel'>materiel</label>
		<input name='materiel' type='text' value= ".$row['id_materiel'].">
		</div>
		<div>
		<label for='description'>description</label>
	    <input name='description' type='text' value=".$row['description'].">
		</div>
		<div>
		<label for='etat'>Etat</label>
		<input name='etat' type='text' value=".$row['etat'].">
		</div>
	

		<input type='image' src='image/ok.png' style='height:40px; border:solid 1px silver; border-radius:10px;' name='id3' value=".$row['id_incident']."></fieldset>
	</form>";
	
	}
	 /**
	   * modifier un rôle je ne sais pas encore  comment gérer cela 
	   * j'aimerai bien gardé le faite de créer et modifier des role 
	   * ou admin que on a pas be soin de rentrer danns le code pour créer des role ou les modifier
	 */
	if($cible4!=0)
	{
	 
   

		$query= "select*from role where id_role='$cible4'";
		echo"<table width='0%' cellpadding='5' cellspacing='1' border='0'>"; 
		$res=$db->query($query);
		foreach($res as $row) 
		   

   
		{ 
	     echo"<tr><td bgcolor='#00BFFF'>".$row['reference']."</td><td bgcolor='#00BFFF'>".$row['nom']."</td><td bgcolor='#00BFFF'>".$row['id_contrat']."</td>"; 
		}	 

	echo"<form action='update.php' method='get'>
		<fieldset>
		<div>
		<label for='reference'>reference</label>
		<input name='reference' type='text' value= ".$row['reference'].">
		</div>
		<div>
		<label for='nom'>nom</label>
	    <input name='nom' type='text' value=".$row['nom'].">
		</div>
		<div>
		<label for='contrat'>contrat</label>
		<input name='contrat' type='text' value=".$row['id_contrat'].">
		</div>
	

		<input type='image' src='image/ok.png' style='height:40px; border:solid 1px silver; border-radius:10px;' name='id4' value=".$row['id_role']."></fieldset>
	</form>";
	
	}
         /*<button name='task' onclick='document.location=\"update.php? task=".$row['id']."\" ;'/><img src='ok.png'/></button></fieldset></form>";*/
?>
</body></html>