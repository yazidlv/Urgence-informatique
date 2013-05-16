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
		<h1>la liste des clients</h1>
		
	
<?php	//<a name="retour" onclick="document.location=\'essai\principal.php?\'" />
	$db = new PDO('mysql:host=127.0.0.1','root','');
	$res= $db->exec('create database if not exists projet');
	$db = new PDO('mysql:host=127.0.0.1;dbname=projet','root','');

  
   $= $res= $db->exec('create table if not exists users(
   id int NOT NULL auto_increment primary key,
   nom varchar(30) NOT NULL,
   prenom varchar(30) NOT NULL,
   mail varchar(50) not null,
   password varchar(40),
   role int (2) not null,
   id_incident int,
   foreign key users(id_incident) references  incident(id_incident),
   foreign key users(role) references role(id_role))');
   
  	$query= 'select id, nom, prenom, mail, role from users order by nom, prenom';
	echo"<table width='0%' cellpadding='5' cellspacing='1' border='0' align='center'>"; 
	echo '<tr class="survolOrange fondPardefautColor">'; 
    echo '<ul><a name="retour" onclick="document.location=\'customers.php?\' ;" /><img src="image/retour.png"/> </a></ul><br>';

    echo"<tr><td bgcolor='#00BFFF' align='center'><b>Nom</b></td><td bgcolor='#00BFFF' align='center'><b>Prenom</b></td><td bgcolor='#00BFFF' align='center'><b>Email</b></td>";
	$res=$db->query($query);
	
	if($res)
	{
		foreach($res as $row) 
		{   if ($row['nom']!== null && $row['role']==='2')
	        {
				echo"<tr><td bgcolor='white'>".$row['nom']."</td><td bgcolor='white'>".$row['prenom']."</td><td bgcolor='white'>".$row['mail']."</td>
				<td bgcolor='#FFFFFF'><button name='task1' onclick='document.location=\"delete.php?cible=".$row['id']."\" ;'/><img src='image/delete.png'/><button name='task' onclick='document.location=\"edit.php? cible=".$row['id']."\" ;'/><img src='image/edit.png'/></td></tr>";
		    }                     
		} 
	}
?>
   
   
   
   
   
   
   </body>
  </html>