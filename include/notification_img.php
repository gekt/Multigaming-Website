<?php
session_start();
@mysql_connect("localhost", "root", "");
@mysql_select_db("multigaming");
$sql = "SELECT * FROM notification WHERE pseudo='" . $_SESSION['login'] . "'";
$req = @mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
$notifications = @mysql_num_rows($req);
?>


    <?php if ($notifications > 0) {
    ?>
    <img class="notification_ico" data-modal="open_notification" src="img/notification.png"/>
    <?php
    }else {
        ?>
        <img class="notification_ico" data-modal="open_notification" style="visibility: hidden;" src="img/notification.png"/>
        <?php
    }
    ?>