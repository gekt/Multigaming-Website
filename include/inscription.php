<?php
// on teste si le visiteur a soumis le formulaire
if (isset($_POST['inscription']) && $_POST['inscription'] == "S'inscrire") {
	// on teste l'existence de nos variables. On teste également si elles ne sont pas vides
	if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pass']) && !empty($_POST['pass'])) && (isset($_POST['pass_confirm']) && !empty($_POST['pass_confirm']))) {
	// on teste les deux mots de passe
	if ($_POST['pass'] != $_POST['pass_confirm']) {
		$erreur = 'Les 2 mots de passe sont différents.';
	}
	else {
		// on recherche si ce login est déjà utilisé par un autre membre
		$sql = 'SELECT count(*) FROM membres WHERE pseudo="'.@mysql_escape_string($_POST['login']).'"';
		$req = @mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.@mysql_error());
		$data = @mysql_fetch_array($req);

		if ($data[0] == 0) {
		$sql = 'INSERT INTO membres VALUES("", "'.@mysql_escape_string($_POST['login']).'", "'.@mysql_escape_string(md5($_POST['pass'])).'", "0", "0", "0")';
		@mysql_query($sql) or die('Erreur SQL !'.$sql.'<br />'.@mysql_error());

		session_start();
		$_SESSION['login'] = $_POST['login'];
		header('Location: index.php');
		exit();
		}
		else {
		$erreur = 'Un membre possède déjà ce login.';
		}
	}
	}
	else {
	$erreur = 'Au moins un des champs est vide.';
	}
}
?>
<?php 
?>