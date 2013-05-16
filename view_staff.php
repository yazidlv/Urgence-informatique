<!DOCTYPE html>
<html>
	<head>
		
		<meta charset="UTF-8">
		<title>urgence informatique</title>
		
		<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.18.custom.css" rel="stylesheet" />	
		<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.18.custom.min.js"></script>
        <script type="text/javascript">

			$(function(){
			
			// cacher les suggestions
				$('#querySuggestions').hide(0);
				
		    // faire en sorte que lorsque l'on change le texte du champ de recherche, on affiche la boîte de suggestions
		     $('[name="query"]').keyup(function(event){
					var suggestionBoxIsHidden = ($("#querySuggestions").css('display') == 'none');
					var textInQueryTextField = $(this).attr('value');
					var lengthOfTextInQueryTextField = textInQueryTextField.length;
					var aboutToShow = false;
					
					// on masque les suggestions automatiquement lorsque la zone texte est vide
					if (!suggestionBoxIsHidden && lengthOfTextInQueryTextField == 0) {
						hideSuggestionsBox();
					}
				    else if (suggestionBoxIsHidden && lengthOfTextInQueryTextField > 0) {
						showSuggestionsBox();
						aboutToShow = true;
					}
					
					if (!suggestionBoxIsHidden || aboutToShow) {
				         clearSuggestions();
						 appendSuggestion('vous avez');
						 appendSuggestion('saisi le texte');
						 appendSuggestion('suivant : ' + textInQueryTextField);
					}
					});
					
					// fermer la liste des suggestions
					hideSuggestionsBox();
					
					// déplacer la boîte de résultats vers le haut de la page et afficher les résultats
					$('#queryForm').animate({
						top: "30%"
					});
				
				$('#querySuggestions').on('click', 'li', function(){
					$('[name="query"]').attr('value', $(this).text());
					hideSuggestionsBox();
				});
			});
			
			function showSuggestionsBox() {
				$("#querySuggestions").show('slow');
			}
			
			function hideSuggestionsBox() {
				$("#querySuggestions").hide('slow');
				clearSuggestions();
			}
			
			function clearSuggestions() {
				$('#querySuggestions').html('');
			}
			
			function appendSuggestion(text) {
				$('<li></li>').text(text).appendTo('#querySuggestions');
			}
		</script>

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
			
			/* éléments avec un attribut "name" égal à "query" */
			#queryForm{
				position: absolute;
				top: 50%;
				left: 50%;
				width: 35%;
				margin-top: -1.25em;
				margin-left: -17%;
			}
			
			[name="query"]{
			    width: 100%;
		        box-shadow: 2px 2px 10px #ccc;
				height: 2.5em;
				padding: 3px 10px;
				border: 1px solid #ccc;
				color: #333;
				font-size: 1.1em;
				font-weight: bold;
				font-family: "Courier New", Courier, Monaco, monospace;
				letter-spacing: 1px;
				outline: none;
				background-image: url("image/search.png");
				background-repeat: no-repeat;
				background-position: right center;
			}
			
			/* la boîte de suggestions */
			#querySuggestions{
				padding: 0; 
				margin: 0;
				width: 100%;
				border: 1px solid #ccc;
			}
			
			/* les éléments de suggestion */
			#querySuggestions li{
				display: block;
				margin: 3px;
				padding: 3px;
				background-color: white;
			}
			#querySuggestions li:hover{
				background-color: #ddd;
			}
			
			#alertWidget{
			    position: absolute;
			    bottom: 0px;
				right: 10px;
				left: 10px;
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
				top:10em;width:10em;
				
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
		<h1>la liste du personnel</h1>
		
	

<?php /*include ('role_class.php');
$user= new User;
$role= $user->getRole();	*/

	$db = new PDO('mysql:host=127.0.0.1','root','');
//$db->exec('DROP database projet');
	$res= $db->exec('create database if not exists projet');
	$db = new PDO('mysql:host=127.0.0.1;dbname=projet','root','');

  
   $res= $db->exec('create table if not exists users(
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
    echo '<ul><a name="retour" onclick="document.location=\'staff.php?\' ;" /><img src="image/retour.png"/> </a></ul><br>';

    echo"<tr><td bgcolor='#00BFFF' align='center'><b>Nom</b></td><td bgcolor='#00BFFF' align='center'><b>Prenom</b></td><td bgcolor='#00BFFF' align='center'><b>Email</b></td><td bgcolor='#00BFFF' align='center'><b>Rôle</b></td>";
	$res=$db->query($query);
	
	if($res)
	{
		foreach($res as $row) 
		{   if ($row['nom']!== null && $row['prenom']!== null && $row['role']!=='2')
	        {
				echo"<tr><td bgcolor='white'>".$row['nom']."</td><td bgcolor='white'>".$row['prenom']."</td><td bgcolor='white'>".$row['mail']."</td><td bgcolor='white'>".$row['role']."</td>
				<td bgcolor='#FFFFFF'><button name='task1' onclick='document.location=\"delete.php?cible=".$row['id']."\" ;'/><img src='image/delete.png'/><button name='task' onclick='document.location=\"edit.php? cible=".$row['id']."\" ;'/><img src='image/edit.png'/></td></tr>";
		    }                     
		} 
	}
?>		
		

	
	</body>
</html>