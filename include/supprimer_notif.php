<?php
session_start();

	$base = @mysql_connect ('localhost', 'root', '');
	@mysql_select_db ('multigaming', $base);

	// on prépare une requête SQL permettant de supprimer le message tout en vérifiant qu'il appartient bien au membre qui essaye de le supprimer
	$sql = 'DELETE FROM notification WHERE pseudo="'.$_SESSION['login'].'"';
	// on lance cette requête SQL
	$req = @mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());

	mysql_close();

	header ('Location: ../index.php');
	exit();

	?>