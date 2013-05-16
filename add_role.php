<!DOCTYPE html>
<html>
	<head>
		
		<meta charset="UTF-8">
		<title>urgence informatique</title>
		
		<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.18.custom.css" rel="stylesheet" />	
		

		<style type="text/css">
		h1{
			font-size:300%;
			ont-family:"verdana",Times,serif;
			text-decoration:blink;
			text-align:center;
			color: 	#00BFFF ;
		}
			
		#milieu{
			margin:15px 520px 0px 320px;
		}
			
		body{
			 padding: 0;
			 margin: 0;
			 background-color: white;
			 color: #333;
			 font-family: Verdana, Arial, Helvetica, sans-serif;
			}

		.submit
		{

		
			
			background-position: right center;
			text-align:center;
		}
			
		
		</style>
		
	</head>
	
	<body>
		<h1>ajouter un rôle</h1>


<form action="role_query.php" method="get">
<?php
echo'<ul><tr><a name="retour" onclick="document.location=\'gestion_role.php?\'" /><img src="image/retour.png"/></a></tr><br></ul>';
?>
		<fieldset>
	
	<ul><label><input name="designation" type="text" placeholder="désignation">
	
		</label></ul></fieldset>
</form>	
<h3>les droits possibles</h3>

	<li><input type="checkbox" name="user"  value="1">ajouter de nouveaux membres du personnel     <br></li>
	<li><input type="checkbox" name="user3" value="7">ajouter membres du personnel                  <br></li>
	
	<li><input type="checkbox" name="user1"  value="2">ajouter de nouveaux clients                  <br></li>
	<li><input type="checkbox" name="user2" value="5">ajouter un contrat client                     	<br></li>
	<li><input type="checkbox" name="user4" value="15">supprimer un client                           <br></li>
	
	
	<li><input type="checkbox" name="role" value="3">ajouter un nouveaux rôle                      <br></li>
	<li><input type="checkbox" name="role1" value="16">supprimer un rôle                              <br></li>
	
	
	<li><input type="checkbox" name="mat" value="4">ajouter des types de matériels maintenus      <br></li>
	
	<li><input type="checkbox" name="contrat" value="14">visualiser contrat                             <br></li>
	
	
	
	<li><input type="checkbox" name="incident" value="6">ajouter des informations sur leur intervention<br></li>
	<li><input type="checkbox" name="incident1" value="8">affecter un accident                            <br></li>
	<li><input type="checkbox" name="incident2" value="9">prendre en charge  un incident                <br></li>
	<li><input type="checkbox" name="incident3" value="10">fermer un incident                             <br></li>
	<li><input type="checkbox" name="incident4" value="11">voir la liste des incidents non pris en charge<br></li>
	<li><input type="checkbox" name="incident5" value="12">ouvrir un incident                            <br></li>
	<li><input type="checkbox" name="incident6" value="13">suivre  incident                              <br></li>
	
	
	
	
	
	
	<p class="submit"><input type="submit" value="Enregistrer" /></p>
