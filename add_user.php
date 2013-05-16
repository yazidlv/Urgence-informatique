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

	<h1> ajouter client </h1>
<?php
echo'<a name="retour" onclick="document.location=\'customers.php?\' ;"/><img src="image/retour.png"/></a><br>';	
$today = date("F j, Y, H:i");
echo "<b>$today </b>";
	
?>
	<form action="query_user.php" method="get">
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
		
	<p class="submit"><input type="submit" value="Enregistrer" /></p>
		</fieldset>
	</form>
</body>
</html>