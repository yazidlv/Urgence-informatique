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

	<h1> ajouter un matériel</h1>
<?php
echo'<a name="retour" onclick="document.location=\'equipement.php?\' ;"/><img src="image/retour.png"/></a><br>';	
$today = date("F j, Y, H:i");
echo "<b>$today </b>";
  
?>
	<form action="query_equipement.php" method="get">
		<fieldset>
	
		<div>
			<label for="reference">reference</label>
			<input name="reference" type="text">
		</div>
		<div>
			<label for="nom">nom</label>
			<input name="nom" type="text">
		</div>
		<div>
			<label for="contrat">ID contrat</label>
			<input name="contrat" type="text">
		</div>
	
	<p class="submit"><input type="submit" value="Enregistrer" /></p>
		</fieldset>
	</form>
</body>
</html>