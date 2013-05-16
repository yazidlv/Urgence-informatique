<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title></title>
	<style type="text/css">
		label {
			display: inline-block;
			width: 80px;
		}
		
	
	</style>
</head>
<body>

	<h1> ajout d'un incident</h1>
<?php
echo'<a name="retour" onclick="document.location=\'incident.php?\' ;"/><img src="image/retour.png"/></a><br>';	
$today = date("F j, Y, H:i");
echo "<b>$today </b>";
// peremet d'éditer un incident avec la fonction addOption.  qu'il faut trouver comment récuperer la variable.
// ainsi la création de la table état que je n'ai pas éditer encore
// pour integrer l'envoi des mail selon le changement d'état de l'incident.
include("select_html.php");

 $sel=new SelectHtml("values[etat]");
 $sel->addOptions(array(1=>'nouveau', 2=>'en cours', 3=>'affecté', 4=>'réparé', 5=>'non réparé',6=>'testé', 7=>'annulé', 8=>'livré'));

	
?>

	<form action="query_incident.php" method="get">
		<fieldset>
	
		<div>
			<label for="materiel">ID matériel</label>
			<input name="materiel" type="text">
		</div>
		<div>
			<label for="description">description</label>
			<input name="description" type="text">
		</div>
			<div>
<?php		  echo "<label class=\"required\">Etat</label><td> $sel</td>";?>
		</div>
		<div>
			<label for="etat">Etat</label>
			<input name="etat" type="text">
		</div>
	
	<p class="submit"><input type="submit" value="Enregistrer" /></p>
		</fieldset>
	</form>
</body>
</html>