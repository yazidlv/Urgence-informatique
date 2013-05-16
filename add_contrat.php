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

	<h1> ajout d'un contrat</h1>
<?php
echo'<a name="retour" onclick="document.location=\'contrat.php?\' ;"/><img src="image/retour.png"/></a><br>';	
$today = date("F j, Y, H:i");
echo "<b>$today </b>";

?>
	<form action="query_contrat.php" method="get">
		<fieldset>
	
		<div>
			<label for="client">ID client</label>
			<input name="client" type="text">
		</div>
		<div>
			<label for="start">début contrat</label>
			<input name="start" type="date">
		</div>
		<div>
			<label for="end">fin contrat</label>
			<input name="end" type="date">
		</div>
	
	<p class="submit"><input type="submit" value="Enregistrer" /></p>
		</fieldset>
	</form>
</body>
</html>