 <!DOCTYPE html>
<html><head><title>carnet d'adresse</title><meta charset="utf-8" />
<style type="text/css">
label{
	display: inline-block;
	width: 80px;
	}
	


td{
text-align:center;
   border-radius: 0px 10px 0px 10px;
   border-style:solid;
border-color:#00BFFF;
}

</style>
</head>

<body>
<?php

	$db = new PDO('mysql:host=127.0.0.1;dbname=projet','root','');
 $cible=$cible1=$cible2=$cible3=$cible4=0;
	$cible  = isset($_GET['id']) ? $_GET['id'] : null;
	$cible1  = isset($_GET['id1']) ? $_GET['id1'] : null;
	$cible2  = isset($_GET['id2']) ? $_GET['id2'] : null;
	$cible3  = isset($_GET['id3']) ? $_GET['id3'] : null;
	$cible4  = isset($_GET['id4']) ? $_GET['id4'] : null;
	
	
// modifier les utilisateurs 
	if($cible!=0)
	{
		$prenom = isset($_GET['prenom']) ? $_GET['prenom'] : null;
		$nom    = isset($_GET['nom'])    ? $_GET['nom']    : null;
		$mail   = isset($_GET['mail'])    ? $_GET['mail']    : null;
		$MP    = isset($_GET['password'])  ? $_GET['password'] : null;
		$role    = isset($_GET['role'])  ? $_GET['role'] : null;
		
		$query="UPDATE users SET nom='$nom', prenom='$prenom', mail='$mail', password='$MP', role='$role' WHERE id='$cible'";
		$res=$db->query($query);
		$nb=count($res);
	
		if ($nb!=0)
		{
			echo '<a name="retour" onclick="document.location=\'principal.php?\' ;" /><img src="image/retour.png"/></a><br>';
			
			echo"<center><h1>Entrée modifié</h1></center>";
			$query= "select * from users where id='$cible'";
			echo"<table width='0%' cellpadding='5' cellspacing='1' border='0' align='center'>"; 
			echo '<tr>'; 
			 echo"<tr><td bgcolor='#00BFFF' align='center'><b>Nom</b></td><td bgcolor='#00BFFF' align='center'><b>Prénom</b></td><td bgcolor='#00BFFF' align='center'><b>mail</b></td><td bgcolor='#00BFFF' align='center'><b>pasword</b></td><td bgcolor='#00BFFF' align='center'><b>rôle</b></td>";
			$res=$db->query($query);
			
			if($res)
			{
				foreach($res as $row) 
				{   if ($row['nom']!== null && $row['prenom']!== null&& $row['mail']!== null && $row['password']!==null&& $row['role']!==null)
					{
						echo"<tr><td bgcolor='white'>".$row['nom']."</td><td bgcolor='white'>".$row['prenom']."</td><td bgcolor='white'>".$row['mail']."</td><td bgcolor='white'>".$row['password']."</td><td bgcolor='white'>".$row['role']."</td>
						<td bgcolor='#FFFFFF'><button name='task1' onclick='document.location=\"delete.php?cible=".$row['id']."\" ;'/><img src='image/delete.png'/><button name='task' onclick='document.location=\"edit.php? cible=".$row['id']."\" ;'/><img src='image/edit.png'/></td></tr>";
					}                     
				} 
			}
		}
		else
		{
			echo '<a name="retour" onclick="document.location=\'principal.php?\' ;" /><img src="image/retour.png"/></a><br>';
			echo"<center><h4>Erreur</h4></center>";
		}
	}
	
// modiffier les contrat	


	if($cible1!=0)
	{
		$client = isset($_GET['client']) ? $_GET['client'] : null;
		$start    = isset($_GET['start'])    ? $_GET['start']    : null;
		$end   = isset($_GET['end'])    ? $_GET['end']    : null;

		
		$query="UPDATE contract SET id_client='$client', start_date='$start', end_date='$end' WHERE id_contract='$cible1'";
		$res=$db->query($query);
		$nb=count($res);
	
		if ($nb!=0)
		{
			echo '<a name="retour" onclick="document.location=\'principal.php?\' ;" /><img src="image/retour.png"/></a><br>';
			
			echo"<center><h1>Entrée modifié</h1></center>";
			$query= "select * from contract where id_contract='$cible1'";
			echo"<table width='0%' cellpadding='5' cellspacing='1' border='0' align='center'>"; 
			echo '<tr>'; 

			$res=$db->query($query);
			
			if($res)
			{
				foreach($res as $row) 
				{   if ($row['id_contract']!== null && $row['id_client']!== null&& $row['start_date']!== null && $row['end_date']!==null)
					{
						echo"<tr><td bgcolor='white'>".$row['id_contract']."</td><td bgcolor='white'>".$row['id_client']."</td><td bgcolor='white'>".$row['start_date']."</td><td bgcolor='white'>".$row['end_date']."</td>
						<td bgcolor='#FFFFFF'><button name='task1' onclick='document.location=\"delete.php?cible1=".$row['id_contract']."\" ;'/><img src='image/delete.png'/><button name='task' onclick='document.location=\"edit.php? cible1=".$row['id_contract']."\" ;'/><img src='image/edit.png'/></td></tr>";
					}                     
				} 
			}
		}
		else
		{
			echo '<a name="retour" onclick="document.location=\'principal.php?\' ;" /><img src="image/retour.png"/></a><br>';
			echo"<center><h4>Erreur</h4></center>";
		}
	}
	// modifier equipement
	
	if($cible2!=0)
	{
		$reference = isset($_GET['reference']) ? $_GET['reference'] : null;
		$nom    = isset($_GET['nom'])    ? $_GET['nom']    : null;
		$contrat   = isset($_GET['contrat'])    ? $_GET['contrat']    : null;

		
		$query="UPDATE materiel SET reference='$reference', nom='$nom', id_contrat='$contrat' WHERE id_mat='$cible2'";
		$res=$db->query($query);
		$nb=count($res);
	
		if ($nb!=0)
		{
			echo '<a name="retour" onclick="document.location=\'principal.php?\' ;" /><img src="image/retour.png"/></a><br>';
			
			echo"<center><h1>Entrée modifié</h1></center>";
			$query= "select * from materiel where id_contract='$cible2'";
			echo"<table width='0%' cellpadding='5' cellspacing='1' border='0' align='center'>"; 
			echo '<tr>'; 

			$res=$db->query($query);
			
			if($res)
			{
				foreach($res as $row) 
				{   if ($row['id_mat']!== null && $row['reference']!== null)
					{
						echo"<tr><td bgcolor='white'>".$row['id_mat']."</td><td bgcolor='white'>".$row['reference']."</td><td bgcolor='white'>".$row['nom']."</td><td bgcolor='white'>".$row['id_contrat']."</td>
						<td bgcolor='#FFFFFF'><button name='task1' onclick='document.location=\"delete.php?cible2=".$row['id_contract']."\" ;'/><img src='image/delete.png'/><button name='task' onclick='document.location=\"edit.php? cible2=".$row['id_mat']."\" ;'/><img src='image/edit.png'/></td></tr>";
					}                     
				} 
			}
		}
		else
		{
			echo '<a name="retour" onclick="document.location=\'principal.php?\' ;" /><img src="image/retour.png"/></a><br>';
			echo"<center><h4>Erreur</h4></center>";
		}
	}
	
		if($cible3!=0)
	{
		$materiel = isset($_GET['materiel']) ? $_GET['materiel'] : null;
		$description   = isset($_GET['description'])    ? $_GET['description']    : null;
		$etat   = isset($_GET['etat'])    ? $_GET['etat']    : null;

		
		$query="UPDATE incident SET id_materiel='$materiel', description='$description', etat='$etat' WHERE id_incident='$cible3'";
		$res=$db->query($query);
		$nb=count($res);
	
		if ($nb!=0)
		{
			echo '<a name="retour" onclick="document.location=\'principal.php?\' ;" /><img src="image/retour.png"/></a><br>';
			
			echo"<center><h1>Entrée modifié</h1></center>";
			$query= "select * from incident where id_incident='$cible3'";
			echo"<table width='0%' cellpadding='5' cellspacing='1' border='0' align='center'>"; 
			echo '<tr>'; 

			$res=$db->query($query);
			
			if($res)
			{
				foreach($res as $row) 
				{   if ($row['id_incident']!== null && $row['description']!== null)
					{
						echo"<tr><td bgcolor='white'>".$row['id_incident']."</td><td bgcolor='white'>".$row['id_materiel']."</td><td bgcolor='white'>".$row['description']."</td><td bgcolor='white'>".$row['etat']."</td>
						<td bgcolor='#FFFFFF'><button name='task1' onclick='document.location=\"delete.php?cible3=".$row['id_incident']."\" ;'/><img src='image/delete.png'/>
						<button name='task' onclick='document.location=\"edit.php? cible3=".$row['id_incident']."\" ;'/><img src='image/edit.png'/>
						<button name='task' onclick='document.location=\"affect.php? cible3=".$row['id_incident']."\" ;'/><img src='image/arrow.png'/>
						<button name='task' onclick='document.location=\"suivre.php? cible3=".$row['id_incident']."\" ;'/><img src='image/suivre.png'/></td></tr>";
					}                     
				} 
			}
		}
		else
		{
			echo '<a name="retour" onclick="document.location=\'principal.php?\' ;" /><img src="image/retour.png"/></a><br>';
			echo"<center><h4>Erreur</h4></center>";
		}
	}
?>   
		
</body>
</html>