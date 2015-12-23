<?php
    session_start();
    include 'config.php';

    $checkadmin = @mysql_query ("SELECT * FROM membres WHERE pseudo='" . $_SESSION['login'] . "' ");
    while ($data = @mysql_fetch_array($checkadmin)) {
        $nb_points = $data['points'];
        echo $nb_points;
    }
?>