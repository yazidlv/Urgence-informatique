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

	<h1> ajouter personnel </h1>

<?php

// permet d'ajouter un fichier
// select_html il ya quelque fonction de gecko comme addOptions pour afficher des chois au lieu des chiffre
// reste à voir comment récupéréer la valeur du choix et ble stocker dans la table
include("select_html.php");
echo'<a name="retour" onclick="document.location=\'staff.php?\' ;"/><img src="image/retour.png"/></a><br>';	
$today = date("F j, Y, H:i");
echo "<b>$today </b>";

 $sel=new SelectHtml("values[role]");
 $sel->addOptions(array(1=>'administrateur', 2=>'client', 3=>'resp_incident', 4=>'valideur', 5=>'réparateur'));

	
?>
	<form action="query_staff.php" method="get">
		<fieldset>
	
		<div>
			<label for="nom">Nom</label>
			<input name="nom" type="text">
		</div>
		<div>
			<label for="prenom">prenom</label>
			<input name="prenom" type="text">
		</div>
		<div>
			<label for="mail">Email</label>
			<input name="mail" type="email">
		</div>
		<div>
			<label for="tel">password</label>
			<input name="tel" type="password">
		</div>
		<div>
<?php		  echo "<label class=\"required\">Rôle</label><td> $sel</td>";?>
		</div>
		<div>
			<label for="role">rôle</label>
			<input name="role" type="text">
		</div>
		
	<p class="submit"><input type="submit" value="Enregistrer" /></p>
		</fieldset>
	</form>
</body>
</html>