<!DOCTYPE html>
<html>
	<head>
		
		<meta charset="UTF-8">

	
<link rel="shortcut icon" type="image/x-icon" href="image/logo.ico">
		
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
				top:5em;width:6em;
				
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
		<h1>urgence informatique</h1>
		
	
		


		<form id="queryForm" action="resultat.php" method="get">
			<input type="text" name="query" maxlength="37">
			<ul id="querySuggestions"></ul>
		</form>
	
<?php /*include ('role_class.php');
$user= new User;
$role= $user->getRole();	*/?>

	 <ul>
			<a   class ="info" style="target-name:new; target-new:tab;" target="_new" href="gestion_role.php"><img src="image/role.png"/><span>Rôles</span></a>
			<a   class="info" style="target-name:new; target-new:tab;" target="_new" href="customers.php"><img src="image/client.png"/><span>Clients</span></a>
			<a   class ="info" style="target-name:new; target-new:tab;" target="_new" href="staff.php"><img src="image/personnel.png"/><span>Personnels</span></a>
			<a   class ="info" style="target-name:new; target-new:tab;" target="_new" href="contrat.php"><img src="image/contrat.png"/><span>Contrats</span></a>
			<a   class ="info" style="target-name:new; target-new:tab;" target="_new" href="equipement.php"><img src="image/computer.png"/><span>Matériels</span></a>
			<a   class ="info" style="target-name:new; target-new:tab;" target="_new" href="incident.php"><img src="image/incident.png"/><span>Incidents</span><br></a>
		</ul>
	
		<meta http-equiv="Refresh" content="10">
		<?php
			$today = date("F j, Y, H:i");
			echo "<span><b> $today </b></span>";		
		?>

	
	</body>
</html>