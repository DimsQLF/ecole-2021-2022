<?php 
	//connexion à la BDD
	mysql_connect ("localhost", "root", "usbw");
	mysql_select_db("espace_commentaire");
	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />    
		<title>Barre de recherche</title>
		<meta name="robots" content="noindex, nofollow">
	</head>
	<body>
		<form method="GET">
	   		<input type="search" name="s" placeholder="Rechercher un email" />
	   		<input type="submit" value="Rechercher" />
		</form>
		<?php
				//connexion à la BDD
				require ("connect.php");
				$bdd = mysql_connect (SERVEUR, LOGIN, MDP);
			$query = $_GET['s']; 
			// gets value sent over search form
			
			$min_length = 1;
			// you can set minimum length of the query if you want
			
			if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
				
				$query = htmlspecialchars($query); 
				// changes characters used in html to their equivalents, for example: < to &gt;
				
				$query = mysql_real_escape_string($query);
				// makes sure nobody uses SQL injection
				
				$raw_results = mysql_query("SELECT * FROM stockage
					WHERE (`mail` LIKE '%".$query."%') OR (`comment` LIKE '%".$query."%')") or die(mysql_error());
					
				// * means that it selects all fields, you can also write: `id`, `title`, `text`
				// articles is the name of our table
				
				// '%$query%' is what we're looking for, % means anything, for example if $query is Hello
				// it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
				// or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'
				
				if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
					
					while($results = mysql_fetch_array($raw_results)){
					// $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
					
						echo "<p><h3>".$results['mail']."</h3>".$results['comment']."</p>";
						// posts results gotten from database(title and text) you can also show id ($results['id'])
					}
					
				}
				else{ // if there is no matching rows do following
					echo "Aucun commentaire";
				}
				
			}
		?>
				<p><a href="formulaire.php">Retour au formulaire</a></p> 
	</body> 
</html> 