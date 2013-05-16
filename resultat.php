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

	<h1> résultats de la recherche </h1>
<?php
// fichier permet d'afficher le résultat de la recherche le bu que que la variable query de chaque barre soi unique selon la variable on fai une recherche dans la table concerné sauf lorsque obn fai
// dans la page principal la il faut faire une recherche dans toutes les tables. 
	$db = new PDO('mysql:host=127.0.0.1;dbname=projet','root','');
$today = date("F j, Y, H:i");

 // je récupére toute les variables query
	$query= isset($_GET['query']) ? $_GET['query'] : null;
	$query1= isset($_GET['query1']) ? $_GET['query1'] : null;
	$query2= isset($_GET['query2']) ? $_GET['query2'] : null;
	$query3= isset($_GET['query3']) ? $_GET['query3'] : null;
	$query4= isset($_GET['query4']) ? $_GET['query4'] : null;
	$query5= isset($_GET['query5']) ? $_GET['query5'] : null;
	
echo '<tr><a name="retour" onclick="document.location=\'principal.php?\' ;" /><img src="image/retour.png"/></a></tr><br>';

	
	

if($query2!==null)
{
    $query= "select id, nom, prenom, mail, role from users where nom like'%$query2%' || prenom like'%$query2%' || mail like'%$query2%'";

	$res=$db->query($query);
	

	if ($res === FALSE)
	{
		$error = $db->errorInfo();
		die('Erreur : ' . $error[2]); // permet d'afficher l'erreur écrite en lettre
	}
	echo"<table width='0%' cellpadding='5' cellspacing='1' border='0' align='center'>"; 
	echo '<tr class="survolOrange fondPardefautColor">'; 
	echo"<tr><td bgcolor='#FF0000' align='center'><b>la liste des clients</b></td></tr>";
	echo"<tr><td bgcolor='#00BFFF' align='center'><b>Nom</b></td><td bgcolor='#00BFFF' align='center'><b>Prenom</b></td><td bgcolor='#00BFFF' align='center'><b>Email</b></td></tr>";


	
	foreach($res as $row) 
		{

	if ($row['nom']!== null && $row['prenom']!== null && $row['role']==='2')
	        {
				echo"<tr><td bgcolor='white'>".$row['nom']."</td><td bgcolor='white'>".$row['prenom']."</td><td bgcolor='white'>".$row['mail']."</td>
				<td bgcolor='#FFFFFF'><button name='task1' onclick='document.location=\"delete.php?cible=".$row['id']."\" ;'/><img src='image/delete.png'/><button name='task' onclick='document.location=\"edit.php? cible=".$row['id']."\" ;'/><img src='image/edit.png'/></td></tr>";
		    }                     
		} 
		


}	

if($query1!==null)
{
    $query= "select id, nom, prenom, mail, role from users where nom like'%$query1%' || prenom like'%$query1%' || mail like'%$query1%'";

	$res=$db->query($query);
	
	
	if ($res === FALSE)
	{
		$error = $db->errorInfo();
		die('Erreur : ' . $error[2]); // permet d'afficher l'erreur écrite en lettre
	}
	
		echo"<tr><td bgcolor='#FF0000' align='center'><b>la liste du personnels</b></td></tr>";	
 echo"<tr><td bgcolor='#00BFFF' align='center'><b>Nom</b></td><td bgcolor='#00BFFF' align='center'><b>Prenom</b></td><td bgcolor='#00BFFF' align='center'><b>Email</b></td><td bgcolor='#00BFFF' align='center'><b>Rôle</b></td>";

	
	foreach($res as $row) 
		{   
		



  
	if ($row['nom']!== null && $row['prenom']!== null && $row['role']!=='2')
	        {
				echo"<tr><td bgcolor='white'>".$row['nom']."</td><td bgcolor='white'>".$row['prenom']."</td><td bgcolor='white'>".$row['mail']."</td><td bgcolor='white'>".$row['role']."</td>
				<td bgcolor='#FFFFFF'><button name='task1' onclick='document.location=\"delete.php?cible=".$row['id']."\" ;'/><img src='image/delete.png'/><button name='task' onclick='document.location=\"edit.php? cible=".$row['id']."\" ;'/><img src='image/edit.png'/></td></tr>";
		    }                     
		} 
		
}

if($query3!==null)
{
    $query= "select * from contract where start_date like'%$query3%' || end_date like'%$query3%' || id_contract like'%$query3%' || id_client like'%$query3%'";
$res=$db->query($query);
	
	if($res===false)
	{
	
	$error = $db->errorInfo();
		die('Erreur : ' . $error[2]); // permet d'afficher l'erreur écrite en lettre
	}

	echo"<tr><td bgcolor='#FF0000' align='center'><b>la liste du matériel</b></td></tr>";
	echo"<tr><td bgcolor='#00BFFF' align='center'><b>Reference</b></td><td bgcolor='#00BFFF' align='center'><b>Nom</b></td><td bgcolor='#00BFFF' align='center'><b>ID Contrat</b></td>";
		foreach($res as $row) 
		{   if ($row['reference']!== null && $row['nom']!== null && $row['role']==null)
	        {
				echo"<tr><td bgcolor='white'>".$row['reference']."</td><td bgcolor='white'>".$row['nom']."</td><td bgcolor='white'>".$row['id_contrat']."</td>
				<td bgcolor='#FFFFFF'><button name='task1' onclick='document.location=\"delete.php?cible2=".$row['id_mat']."\" ;'/><img src='image/delete.png'/><button name='task' onclick='document.location=\"edit.php? cible2=".$row['id_mat']."\" ;'/><img src='image/edit.png'/></td></tr>";
		    }                     
		} 
	
}
?>
</body>
</html>