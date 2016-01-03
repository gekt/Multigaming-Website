<?php session_start();?>
<script src="js/pop_up.js"></script> 
<button data-modal="close_notification" class="modal-close-button">&times;</button>
<h2 class="title-popup">Tes notifications :</h2>
<div class="scrollbar-notif">
        <?php
            @mysql_connect("localhost", "root", "");
            @mysql_select_db("multigaming");
            $sql = "SELECT * FROM notification WHERE pseudo='" . $_SESSION['login'] . "' ORDER BY time DESC";
            $req = @mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
            $notifications = @mysql_num_rows($req);


       if ($notifications == 0) {
            ?>
        <p>Aucune notification</p>
<?php
        }
        else {
        while ($data = @mysql_fetch_array($req)) {
?>
            <p class="historique_points"><?php echo "Le " . date('d/m/y', $data['time']) . " à " . date('H:i', $data['time']) . " " . html_entity_decode(nl2br(htmlentities(trim($data['message'])))) ?></p>
<?php
        }
    }
?>
</div>
    <button class="del-notif_button" onclick="supprimer();">Supprimer les notifications</button>
    <script type="text/javascript">
        function supprimer() {
            document.location.href="include/supprimer_notif.php"
        }
    </script>