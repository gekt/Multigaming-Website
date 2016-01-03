<?php
    $checkadmin = @mysql_query ("SELECT * FROM membres WHERE pseudo='" . $_SESSION['login'] . "' ");
    while ($data = @mysql_fetch_array($checkadmin)) {
        $nb_points = $data['points'];
    }

    $nb_destinataire = 0;
    if (isset($_POST['envoie_points'])) {
        if ((isset($_POST['points_envoyé'])) || (isset($_POST['pseudo_destinataire']))) {
        $maintenance = @mysql_query ("SELECT points FROM membres WHERE pseudo='" . $_POST['pseudo_destinataire'] . "' ");
        while ($data = @mysql_fetch_array($maintenance)) {
            $nb_destinataire = $data['points'];
        }

        if ($nb_points < $_POST['points_envoyé']) {
?>
            <div class="alert alert-danger alert-espace-membre">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Erreur !</strong> Vous n'avez pas assez de points !
            </div>
<?php
        }

        elseif ($_POST['points_envoyé'] < 0) {
?>
            <div class="alert alert-danger alert-espace-membre">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Erreur !</strong> Vous ne pouvez pas mettre de valeur négative !
            </div>
<?php
        }

        elseif ($_POST['points_envoyé'] == 0) {
?>
            <div class="alert alert-danger alert-espace-membre">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Erreur !</strong> Vous ne pouvez pas mettre de valeur nulle !
            </div>
<?php
        }

        elseif ($nb_destinataire == NULL) {
?>
            <div class="alert alert-danger alert-espace-membre">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Erreur !</strong> <?php echo $_POST['pseudo_destinataire'];?> n'existe pas!
            </div>
<?php
        }

        elseif ($_POST['pseudo_destinataire'] == $_SESSION['login']) {
?>
            <div class="alert alert-danger alert-espace-membre">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Erreur !</strong> Vous ne pouvez pas vous envoyer des points à vous même !
            </div>
<?php
        }

        else {
            $update_points = "UPDATE membres SET points= points + '" . $_POST['points_envoyé'] . "'  WHERE pseudo='" . $_POST['pseudo_destinataire'] . "'";
            mysql_query($update_points) or die('Erreur SQL !'.$update_points.'<br />'.mysql_error());
            @mysql_free_result($update_points);

            $update_points2 = "UPDATE membres SET points= points - '" . $_POST['points_envoyé'] . "'  WHERE pseudo='" . $_SESSION['login'] . "'";
            mysql_query($update_points2) or die('Erreur SQL !'.$update_points2.'<br />'.mysql_error());
            @mysql_free_result($update_points2);

            $time_now = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y")); 
            $notifications_envoie = "INSERT INTO notification VALUES ('', '" . $_SESSION['login'] . "', 'Vous avez envoyé ". $_POST['points_envoyé'] ." points à " . $_POST['pseudo_destinataire'] . "',  '". $time_now ."')";
            mysql_query($notifications_envoie) or die('Erreur SQL !'.$notifications_envoie.'<br />'.mysql_error());
            @mysql_free_result($notifications_envoie);

            $historique_envoie = "INSERT INTO historique_points VALUES ('', '" . $_SESSION['login'] . "', '" . $_POST['pseudo_destinataire'] . "', '". $_POST['points_envoyé'] ."' , '". $time_now ."')";
            mysql_query($historique_envoie) or die('Erreur SQL !'.$historique_envoie.'<br />'.mysql_error());
            @mysql_free_result($historique_envoie);

            $notifications_envoie2 = "INSERT INTO notification VALUES ('', '" . $_POST['pseudo_destinataire'] . "', 'Vous avez reçu ". $_POST['points_envoyé'] ." points de " . $_SESSION['login'] . "', '". $time_now ."')";
            mysql_query($notifications_envoie2) or die('Erreur SQL !'.$notifications_envoie2.'<br />'.mysql_error());
            @mysql_free_result($notifications_envoie2);
?>
            <div class="alert alert-success alert-espace-membre">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Succès !</strong> Vous avez envoyé <?php echo $_POST['points_envoyé']; ?> points à <?php echo $_POST['pseudo_destinataire'];?>
            </div>
<?php 
            }
        }
    }
?>