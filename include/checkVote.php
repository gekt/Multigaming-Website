<?php
    session_start();
    include 'APIphpsend/PHPSend.php';
    include 'config.php';

    $connect = new PHPSsend();
    $result = $connect->PHPSconnect("62.210.244.80","3fdd82fa8e07ee0a","11223");
    $player = $_SESSION['login'];
    $time_cd = $_POST['vote_1'];
    $time_atm = $_POST['time_atm'];
    $time = $_POST['time'];
    $hidden = "false";

    if (isset($_POST['vote_1'])) {
        if ($time_atm >= $time) {
            @mysql_query("UPDATE vote SET time='" . $time_cd . "' WHERE pseudo='". $player ."' ");
            @mysql_query("UPDATE vote SET vote= vote + 1 WHERE pseudo='". $player ."' ");
            $connect->PHPScommand("say " . $player . " vient de voter pour le serveur !");
            $connect->PHPScommand("give " . $player . " 42 64");
            header('Location: ../index.php');
        }
        else {}
    }
    $result = $connect->PHPSdisconnect();
?>
