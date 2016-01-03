<?php
    @mysql_connect("localhost", "root", "");
    @mysql_select_db("multigaming");
    $sql = "SELECT * FROM historique_points WHERE pseudo='" . $_SESSION['login'] . "' ORDER BY time DESC";
    $req = @mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
    $notifications = @mysql_num_rows($req);
?>

<div class="modal-wrapper" data-modal="wrapper_send_points">
    <div class="modal-content">
        <button data-modal="close_send_points" class="modal-close-button">&times;</button>
        <h2 class="title-popup">Envoyer des points :</h2>
        <div class="global-points">
            <div class="send-p_left">
                <h3 class="subtitle historique_subtitle">Historique</h3>
                <div class="scrollbar-s_points">

                <?php if ($notifications == 0) { ?>
                <p class="historique_points">Aucun historique.</p>
                
                <?php }
                else {
                    while ($data = @mysql_fetch_array($req)) {

                        $points = ($data['points'] <= 1) ? 'Point' : 'Points'; ?>
                        <p class="historique_points"><?php echo $data['points'] . " " . $points . " à " . $data['destinataire'] . " le " . date('d/m/y', $data['time']) . " à " . date('H:i', $data['time']); ?></p> <?php
                    }
                } ?>
                </div>
            </div>
            <div class="send-p_verticalbar"></div>
            <div class="send-p_right">
                <form action="index.php" method="post">
    <?php
                    if ($nb_points <= 1) { ?>
                        <h3 class="subtitle sendPoints_subtitle">Il te reste <span class="points_number_popup_send"><?php echo $nb_points; ?> point</span></h3><?php
                    }
                    else { ?>
                        <h3 class="subtitle sendPoints_subtitle">Il te reste <span class="points_number_popup_send"><?php echo $nb_points; ?> points</span></h3><?php
                    }
    ?>
                    <div style="margin-top: 30px;">
                        <p class="send-p_text">Envoyer à : </p>
                        <input class="send-p_input" type="text" name="pseudo_destinataire">
                    </div>
                    <div>
                        <p class="send-p_text">Nombres de points : </p>
                        <input class="send-p_input" type="number" name="points_envoyé">
                    </div>
                    <input class="send-p_button" type="submit" name="envoie_points" value="Envoyer les points">
                </form>
            </div>
        </div>
    </div>
</div>