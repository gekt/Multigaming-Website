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

	<meta charset="utf-8" />
    	<form action="admin.php" method="post">
		<label>Maintenance: <SELECT name="serveur" size="1">
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