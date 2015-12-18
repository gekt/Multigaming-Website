<?php
$erreur = "";
// on teste si le visiteur a soumis le formulaire de connexion
if (isset($_POST['connexion']) && $_POST['connexion'] == 'Connexion') {
	if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pass']) && !empty($_POST['pass']))) {

	// on teste si une entrée de la base contient ce couple login / pass
	$sql = 'SELECT count(*) FROM membres WHERE pseudo="'.@mysql_escape_string($_POST['login']).'" AND pass="'.@mysql_escape_string(md5($_POST['pass'])).'"';
	$req = @mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
	$data = @mysql_fetch_array($req);

	@mysql_free_result($req);
	@mysql_close();

	// si on obtient une réponse, alors l'utilisateur est un membre
	if ($data[0] == 1) {
		session_start();
		$_SESSION['login'] = $_POST['login'];
		header('Location: index.php');
		exit();
	}
	// si on ne trouve aucune réponse, le visiteur s'est trompé soit dans son login, soit dans son mot de passe
	elseif ($data[0] == 0) {
		$erreur = "Nom d'utilisateur ou mot de passe incorrect !";
	}
	// sinon, alors la, il y a un gros problème :)
	else {
		$erreur = 'Problème dans la base de données : plusieurs membres ont les mêmes identifiants de connexion.';
	}
	}
	else {
	$erreur = 'Au moins un des champs est vide.';
	}
}
?>