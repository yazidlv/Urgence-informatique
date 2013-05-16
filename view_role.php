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
		<h1>la liste des rôles</h1>
		
	
<?php	//<a name="retour" onclick="document.location=\'essai\principal.php?\'" />
	$db = new PDO('mysql:host=127.0.0.1','root','');
	$res= $db->exec('create database if not exists projet');
	$db = new PDO('mysql:host=127.0.0.1;dbname=projet','root','');

   $res= $db->exec('create table if not exists role(
   id_role int NOT NULL auto_increment primary key,
   designation varchar(50) NOT NULL)');
   
  	$query= 'select id_role, designation from role';
	echo"<table width='0%' cellpadding='5' cellspacing='1' border='0' align='center'>"; 
	echo '<tr class="survolOrange fondPardefautColor">'; 
    echo '<ul><a name="retour" onclick="document.location=\'gestion_role.php?\' ;" /><img src="image/retour.png"/> </a></ul><br>';

    echo"<tr><td bgcolor='#00BFFF' align='center'><b>ID</b></td><td bgcolor='#00BFFF' align='center'><b>designation</b></td>";
	$res=$db->query($query);
	
	if($res)
	{
		foreach($res as $row) 
		{   if ($row['id_role']!== null && $row['designation']!== null)
	        {
				echo"<tr><td bgcolor='white'>".$row['id_role']."</td><td bgcolor='white'>".$row['designation']."</td>
				<td bgcolor='#FFFFFF'><button name='task1' onclick='document.location=\"delete.php?cible4=".$row['id_role']."\" ;'/><img src='image/delete.png'/><button name='task' onclick='document.location=\"edit.php? cible4=".$row['id_role']."\" ;'/><img src='image/edit.png'/></td></tr>";
		    }                     
		} 
	}
?>
   
   
   
   
   
   
   </body>
  </html>