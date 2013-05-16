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
			
			a.info{
		
				position:relative;
				z-index:24;
				color:#000;
				text-decoration:none
			}
 
			a.info:hover{
			
				z-index:25;
				background-color:#FFF
			}
 
			a.info span{
				display: none
			}
 
			a.info:hover span{
				display:block;
				position:absolute;
				top:10em;width:20em;
			
				background-color:#FFF;
				background:transparent;
				color:#00BFFF;
				text-align: justify;
				font-weight:none;
				padding:5px;
			}
			
		
			span{
				margin: -150px 100px 0px 100px;
				color:#00BFFF;
			}
		</style>
		
	</head>
	
	<body>
		<h1>gestion des rôles</h1>
		
	
<?php	//<a name="retour" onclick="document.location=\'essai\principal.php?\'" />
	$db = new PDO('mysql:host=127.0.0.1','root','');
	$res= $db->exec('create database if not exists projet');
	$db = new PDO('mysql:host=127.0.0.1;dbname=projet','root','');

   $res= $db->exec('create table if not exists role(
   id_role int NOT NULL auto_increment primary key,
   designation varchar(50) NOT NULL');
   echo '<ul><tr><a name="retour" onclick="document.location=\'principal.php?\'" /><img src="image/retour.png"/></a></tr><br></ul>';
   echo'<ul><a class ="info" style="target-name:new; target-new:tab;" target="_new" href="add_role.php"><img src="image/add.png"/><span>ajouter un rôle</span></a>
			<a class="info" style="target-name:new; target-new:tab;" target="_new" href="view_role.php"><img src="image/view.png"/><span>visualiser la liste des rôles</span></a></ul>';
   
   
   
   
   
   
   ?>
   </body>
  </html>