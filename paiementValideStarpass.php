<?php
    $pseudo = $_GET['DATAS'];
    @mysql_connect("localhost", "root", "");
    @mysql_select_db("multigaming");
    @mysql_query("UPDATE membres SET points = points + '10' WHERE pseudo='" . $pseudo . "'");
    header('Location: paiementValide.php')
?>