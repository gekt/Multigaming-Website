<div class="modal-wrapper" data-modal="wrapper_send_points">
    <div class="modal-content">
        <button data-modal="close_send_points" class="modal-close-button">&times;</button>
        <form action="index.php" method="post">
<?php
            if ($nb_points <= 1) {
                ?>Vous avez : <span class="points_number_popup_send"><?php echo $nb_points; ?> point</span></br><?php
            }
            else {
                ?>Vous avez : <span class="points_number_popup_send"><?php echo $nb_points; ?> points</span></br><?php
            }
?>
            Envoyer à : <input type="text" name="pseudo_destinataire"><br />
            Nombres de points : <input type="number" name="points_envoyé"><br />
            <input type="submit" name="envoie_points" value="Envoyer les points">    
        </form>
    </div>
</div>