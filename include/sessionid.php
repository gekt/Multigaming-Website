<?php
 	@mysql_connect("localhost", "root", ""); // Connexion à la base de données
 	@mysql_select_db("espace_membres"); // Sélection de la base de données
	 $reponse = @mysql_query ("SELECT * FROM membre WHERE login='" . $_SESSION['login'] . "' "); // Requête SQL
    
 	while ($donnees = @mysql_fetch_array($reponse)) // On boucle pour afficher toutes les données et on met toutes données dans un tableau
 	{
 	  $id = $donnees['id'];
    }
	?>
