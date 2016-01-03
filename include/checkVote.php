<?php
    session_start();
    include 'APIphpsend/PHPSend.php';
    include 'config.php';

    $connect = new PHPSsend();
    $result = $connect->PHPSconnect("62.210.244.80","3fdd82fa8e07ee0a","11223");
    $player = $_SESSION['login'];
    $server = $_POST['server'];
    $time_revote = $_POST['time_revote'];
    $time_now = $_POST['time_now'];
    $time_latest = $_POST['time_latest'];

    if (isset($_POST['server'])) {
        if ($server == "1") {
            if ($time_now >= $time_latest) {
                @mysql_query("UPDATE vote_ls SET time='" . $time_revote . "' WHERE pseudo='". $player ."' ");
                @mysql_query("UPDATE vote_ls SET vote= vote + 1 WHERE pseudo='". $player ."' ");
                $connect->PHPScommand("say " . $player . " vient de voter pour le serveur !");
                $connect->PHPScommand("give " . $player . " 42 64");
                header('Location: ../index.php');
            }
            else {}
        }
        elseif ($server == "2") {
            if ($time_now >= $time_latest) {
                @mysql_query("UPDATE vote_uz SET time='" . $time_revote . "' WHERE pseudo='". $player ."' ");
                @mysql_query("UPDATE vote_uz SET vote= vote + 1 WHERE pseudo='". $player ."' ");
                header('Location: ../index.php');
            }
        }
        elseif ($server == "3") {
            if ($time_now >= $time_latest) {
                @mysql_query("UPDATE vote_pd SET time='" . $time_revote . "' WHERE pseudo='". $player ."' ");
                @mysql_query("UPDATE vote_pd SET vote= vote + 1 WHERE pseudo='". $player ."' ");
                header('Location: ../index.php');
            }
        }
        elseif ($server == "4") {
            if ($time_now >= $time_latest) {
                @mysql_query("UPDATE vote_mg SET time='" . $time_revote . "' WHERE pseudo='". $player ."' ");
                @mysql_query("UPDATE vote_mg SET vote= vote + 1 WHERE pseudo='". $player ."' ");
                header('Location: ../index.php');
            }
        }
    }
    else {
        header('Location: ../index.php');
    }
    $result = $connect->PHPSdisconnect();
?>
