<!DOCTYPE html>
<html><head><title>carnet d'adresse</title><meta charset="utf-8" /></head>

<body>
<?php

	$db = new PDO('mysql:host=127.0.0.1;dbname=projet','root','');
 
   
	
	$cible= isset($_GET['cible']) ? $_GET['cible'] : null;
	$cible1= isset($_GET['cible1']) ? $_GET['cible1'] : null;
	$cible2= isset($_GET['cible2']) ? $_GET['cible2'] : null;
	$cible3= isset($_GET['cible3']) ? $_GET['cible3'] : null;
	$cible4= isset($_GET['cible4']) ? $_GET['cible4'] : null;

	if($cible!=0)
	{
		$query=" DELETE FROM users WHERE id = '$cible' ";
		$res=$db->query($query);
		$nb=count($res);
		if ($nb!=0)
		{
			echo '<a name="retour" onclick="document.location=\'principal.php?\' ;" /><img src="image/retour.png"/></a><br>';
			echo"<center><h1>Entrée supprimée</h1></center>";
		}
		else
		{
			echo '<a name="retour" onclick="document.location=\'principal.php?\' ;" /><img src="image/retour.png"/></a><br>';
			echo"<center><h4>Erreur</h4></center>";
		}	
	}
	
	
	if($cible1!=0)
	{
		$query=" DELETE FROM contract WHERE id_contract = '$cible1' ";
		$res=$db->query($query);
		$nb=count($res);
		if ($nb!=0)
		{
			echo '<a name="retour" onclick="document.location=\'principal.php?\' ;" /><img src="image/retour.png"/></a><br>';
			echo"<center><h1>Entrée supprimée</h1></center>";
		}
		else
		{
			echo '<a name="retour" onclick="document.location=\'principal.php?\' ;" /><img src="image/retour.png"/></a><br>';
			echo"<center><h4>Erreur</h4></center>";
		}	
	}
	
	if($cible2!=0)
	{
		$query=" DELETE FROM materiel WHERE id_mat = '$cible2' ";
		$res=$db->query($query);
		$nb=count($res);
		if ($nb!=0)
		{
			echo '<a name="retour" onclick="document.location=\'principal.php?\' ;" /><img src="image/retour.png"/></a><br>';
			echo"<center><h1>Entrée supprimée</h1></center>";
		}
		else
		{
			echo '<a name="retour" onclick="document.location=\'principal.php?\' ;" /><img src="image/retour.png"/></a><br>';
			echo"<center><h4>Erreur</h4></center>";
		}	
	}
	
		if($cible3!=0)
	{
		$query=" DELETE FROM incident WHERE id_incident = '$cible3' ";
		$res=$db->query($query);
		$nb=count($res);
		if ($nb!=0)
		{
			echo '<a name="retour" onclick="document.location=\'principal.php?\' ;" /><img src="image/retour.png"/></a><br>';
			echo"<center><h1>Entrée supprimée</h1></center>";
		}
		else
		{
			echo '<a name="retour" onclick="document.location=\'principal.php?\' ;" /><img src="image/retour.png"/></a><br>';
			echo"<center><h4>Erreur</h4></center>";
		}	
	}
	
		if($cible4!=0)
	{
		$query=" DELETE FROM role WHERE id_role = '$cible4' ";
		$res=$db->query($query);
		$nb=count($res);
		if ($nb!=0)
		{
			echo '<a name="retour" onclick="document.location=\'principal.php?\' ;" /><img src="image/retour.png"/></a><br>';
			echo"<center><h1>Entrée supprimée</h1></center>";
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