<?php session_start();?>
<script src="js/pop_up.js"></script> 
<button data-modal="close_notification" class="modal-close-button">&times;</button>
        <?php
            @mysql_connect("localhost", "root", "");
            @mysql_select_db("multigaming");
            $sql = "SELECT * FROM notification WHERE pseudo='" . $_SESSION['login'] . "'";
            $req = @mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
            $notifications = @mysql_num_rows($req);


       if ($notifications == 0) {
            ?>
        <p>Aucune notifications</p>
<?php
        }
        else {
        while ($data = @mysql_fetch_array($req)) {
?>
            <p>
            <?php echo html_entity_decode(nl2br(htmlentities(trim($data['message'])))) ?>
            </p>
<?php
        }
    }
?>
    <button onclick="supprimer();">Supprimer les notifications</button>
    <script type="text/javascript">
        function supprimer() {
            document.location.href="include/supprimer_notif.php"
        }
    </script>