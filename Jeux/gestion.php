<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />    
		<title>affichage des commentaire</title>
		<meta name="robots" content="noindex, nofollow">
	</head>
	<body>
		<?php 
			//connexion à la BDD
			require ("connect.php");
			$connexion = mysql_connect (SERVEUR, LOGIN, MDP);    
			if (!$connexion) {echo "LA CONNEXION AU SERVEUR MYSQL A ECHOUE\n"; exit;}
			mysql_select_db (BDD);
			//Récupération des données du formulaire  
			$nom = $_POST['nom']; $mail = $_POST['mail']; $comment = $_POST['comment']; 
			// Identification du type de gestion demandé 
			if(isSet ($_POST['afficher'])) $choix= "afficher";
			if(isSet ($_POST['ajouter'])) $choix= "ajouter";
			if(isSet ($_POST['supprimer'])) $choix= "supprimer"; 
			switch ($choix) {
				case "afficher":echo "Espace commentaire";break;
				case "ajouter":echo "Votre commentaire a été publié";break;
				case "supprimer":echo "Le commentaire a été supprimé";break;}
			echo "<br/>" ;echo "=======================================================";echo "<br/>" ; 
			//affichage du contenu de la table stockage
			if(isSet ($_POST['afficher']))
				{$resultat = mysql_query("SELECT * FROM stockage");
					while ($ligne=mysql_fetch_array($resultat))
						{echo $ligne['nom']; echo "&nbsp;&nbsp;|<br/>";
						echo $ligne['mail']; echo "&nbsp;&nbsp;|<br/>"; 
						echo $ligne['comment']; echo "&nbsp;&nbsp;|<br/>";
						echo $ligne['date_publication']; echo "&nbsp;&nbsp;|<br/>";
						echo "-------------------------------------------------<br/>";}}
			//ajout d'un enregistrement dans la table stockage
			if(isSet ($_POST['ajouter'])) 
				{echo "nom : $nom <br/> mail : $mail <br/> comment : $comment <br/>\n" ;    
				$requete = "INSERT INTO stockage (nom, mail, comment) VALUES ('$nom','$mail','$comment')";
				$resultat = mysql_query ( $requete , $connexion ) ; 
				if ( $resultat ) echo "La requête ". $requete . " a été effectuée !\n" ; 
				else { echo "La requête n’a pu être exécutee parce que : " 
					. mysql_error ( $connexion ) ; }}
			//suppression d'un enregistrement dans la table stockage
			if(isSet ($_POST['supprimer'])) 
				{echo "nom : $nom <br/> mail : $mail <br/> comment : $comment<br/> \n" ;
				$requete = "DELETE FROM stockage WHERE mail='$mail'";
				$resultat = mysql_query ( $requete , $connexion ) ; 
				if($resultat) 
					echo "La requête ". $requete . " a été effectuée !\n" ; 
				else { echo "La requête n’a pu être exécutée parce que : " 
					. mysql_error ( $connexion ) ; }}
			//Fin de la connexion à la BDD
			mysql_close();
		?>
		<p><a href="barrederecherche.php">Rechercher un commentaire</a></p> 
		<p><a href="formulaire.php">Retour au formulaire</a></p> 
	</body> 
</html> 
