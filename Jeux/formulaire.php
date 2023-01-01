<html>

	<head>
		<meta charset="utf-8"/>
   		<title>inscription</title>
    	<link rel="stylesheet" href="css/style.css"/>  
		<title>Formulaire</title>
		<meta name="robots" content="noindex, nofollow">
	</head>
	<body background="image/background.jpg">
		<div class="headbar">
	         <ul id="nav">
		           <li><a href="index.html">Accueil</a></li>
		           <li><a href="info.html">L'esport</a></li>
		           <li><a href="formulaire.php">Rate us</a></li>
		           <li><a href="connexion.html">s'inscrire/connexion</a></li>
	         </ul>
     	</div>
     	<br>
    	<div class="full-screen-container">
      		<div class="login-container">
        	<h3 class="login-title">EVALUATION DU SITE</h3>
        	<p>
			<form action="gestion.php "method= 'post'> 
				<div class="input-group">
					<label >Nom </label>
					<input type='text' name='nom' value=''/>
				</div>
				<div class="input-group">
					<label>Mail</label>
					<input type="email" name='mail' value=''/>
				</div>
				<div class="input-group">
					<label >Commentaire</label>
					<input type='text' name='comment' value=''/>
				</div>
				<div class="input-group">
					<label>Appréciation</label>
    				<select name="etoile">
      					<option value=''>1</option>
      					<option value=''>2</option>
      					<option value=''>3</option>
      					<option value=''>4</option>
      					<option value=''>5</option>
    				</select>
				</div>

				<br>
    			
				<input type='submit' value='Afficher tout les commentaires' name='afficher' class="login-button"/><br/><br/>  
				<input type='submit' value ='Ajouter' name='ajouter' class="login-button"/><br/>  
				<input type='submit' value ='Supprimer' name='supprimer' class="login-button"/><br/>  
				<input type='reset' value ='Annuler' class="login-button"/> 
			</form>
		</p>

      		</div>
      	</div>



	</body> 
</html> 
