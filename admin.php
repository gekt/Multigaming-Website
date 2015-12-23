<?php 
session_start();
include 'include/config.php';
?>

<?php 
    $checkadmin = @mysql_query ("SELECT * FROM membres WHERE pseudo='" . $_SESSION['login'] . "' ");
    while ($data = @mysql_fetch_array($checkadmin)) {
        $admin = $data['admin'];
    }

    if ($admin != 1) {
    	header ('Location: index.php');
    	exit();
       
    }else {
    	echo "";
    }
?>


<?php
	if (isset($_POST['maintenance_change'])) {
	    $maintenance = @mysql_query ("SELECT maintenance FROM statut_serveur WHERE serveur='" . $_POST['serveur'] . "' ");
	    while ($data = @mysql_fetch_array($maintenance)) 
	        $statut = $data['maintenance'];

	    if ($_POST['statut_maintenance'] == 'Activé') {
	    	$update_statut = "UPDATE statut_serveur SET maintenance=1 WHERE serveur='" . $_POST['serveur'] . "'";
	    	mysql_query($update_statut) or die('Erreur SQL !'.$update_statut.'<br />'.mysql_error());
	    	echo "maintenance activée avec succès!";
	       
	    }
	    else {
	    	$update_statut = "UPDATE statut_serveur SET maintenance=0 WHERE serveur='" . $_POST['serveur'] . "'";
	    	mysql_query($update_statut) or die('Erreur SQL !'.$update_statut.'<br />'.mysql_error());
	    	echo "maintenance desactivée avec succès!";
	    }
	}


?>

<?php
if (isset($_POST['go']) && $_POST['go']=='Poster la news') {
	if (!isset($_POST['titre']) || !isset($_POST['news'])) {
	$erreur = 'Les variables nécessaires au script ne sont pas définies.';
	}
	else {
	if (empty($_POST['titre']) || empty($_POST['news'])) {
		$erreur = 'Au moins un des champs est vide.';
	}
	else {
		$sql = 'INSERT INTO news VALUES("", "'.@mysql_escape_string($_SESSION['login']).'", "'.@mysql_escape_string($_POST['titre']).'", "'.date("Y-m-d H:i:s").'", "'.@mysql_escape_string($_POST['news']).'","'.$_POST['serveur'].'")';
		@mysql_query($sql) or die('Erreur SQL !'.$sql.'<br />'.@mysql_error());
		@mysql_close();
		echo "news envoyée";
		exit();
	}
	}
}
?>

<?php
    $base = @mysql_connect ('localhost', 'root', '');
    @mysql_select_db ('multigaming', $base);
if (isset($_POST['notif_all']) && $_POST['notif_all']=='Poster la news') {
	if (!isset($_POST['notif'])) {
	$erreur = 'Les variables nécessaires au script ne sont pas définies.';
	}
	else {
	if (empty($_POST['notif'])) {
		$erreur = 'Au moins un des champs est vide.';
	}
	else if ($_POST['pseudo'] == "all") {
		$notification_envoie = @mysql_query ("SELECT pseudo FROM membres ");
	    while ($data = @mysql_fetch_array($notification_envoie)){
			    $sql = 'INSERT INTO notification VALUES("", "'.$data['pseudo'].'", "'.$_POST['notif'].'")';
				@mysql_query($sql) or die('Erreur SQL !'.$sql.'<br />'.@mysql_error());
	        }
	        echo "notification envoyée à tout le monde!";
			@mysql_close();
	        exit();
	}else if ($_POST['pseudo'] != "all"){
		$sql = 'INSERT INTO notification VALUES("", "'.$_POST['pseudo'].'", "'.$_POST['notif'].'")';
		@mysql_query($sql) or die('Erreur SQL !'.$sql.'<br />'.@mysql_error());
		echo "notification envoyée à " .$_POST['pseudo']. "";

	}
	}
	@mysql_close();
	exit();
}
?>

	<meta charset="utf-8" />
    <form action="admin.php" method="post">
		<label>Maintenance:<br><br> <SELECT name="serveur" size="1">
		<OPTION>pixelmon
		<OPTION>GTA
		<OPTION>zombie
		<OPTION>mini-game
		</SELECT></label>
		<SELECT name="statut_maintenance" size="1">
			<OPTION>Activé
			<OPTION>Désactivé
		</SELECT>
		<input type="submit" name="maintenance_change" value="Maintenance"><br>
    </form>

	<form action="admin.php" method="post">
		Poster une news:<br><br>
		News :<textarea name="news" cols="50" rows="10"><?php if (isset($_POST['news'])) echo htmlentities(trim($_POST['news'])); ?></textarea><br><br>
		<label>Serveur <SELECT name="serveur" size="1">
		<OPTION>pixelmon
		<OPTION>GTA
		<OPTION>zombie
		<OPTION>mini-game
		</SELECT></label>
		<input type="submit" name="go" value="Poster la news"><br>
	</form>
<?php
		if (isset($erreur)) echo '<br /><br />',$erreur;
?>

	<form action="admin.php" method="post">
		Envoyer une notification à tout les membres:<br><br>
		Notification :<textarea name="notif" cols="50" rows="10"><?php if (isset($_POST['news'])) echo htmlentities(trim($_POST['news'])); ?></textarea><br><br>
		pseudo du joueur (all pour envoyer a tout le monde) :<input type="text" name="pseudo"><?php if (isset($_POST['news'])) echo htmlentities(trim($_POST['news'])); ?></textarea><br><br>
		<input type="submit" name="notif_all" value="Poster la news"><br>
	</form>
<?php
		if (isset($erreur)) echo '<br /><br />',$erreur;
?>