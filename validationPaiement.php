<?php

    // lire le formulaire provenant du système PayPal et ajouter 'cmd'
    $req = 'cmd=_notify-validate';
    
    foreach ($_POST as $key => $value) {
        $value = urlencode(stripslashes($value));
        $req .= "&$key=$value";
    }

    // renvoyer au système PayPal pour validation
    $header .= "POST /cgi-bin/webscr HTTP/1.1\r\n";
    $header .= "Content-Type: application/x-www-form-urlencoded\r\n";
    $header .= "Host: www.paypal.com\r\n";
    $header .= "Connection: close\r\n";
    $header .= "Content-Length: " . strlen($req) . "\r\n\r\n";

    $fp = fsockopen ('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);

    $item_name = $_POST['item_name'];
    $item_number = $_POST['item_number'];
    $payment_status = $_POST['payment_status'];
    $payment_amount = $_POST['mc_gross'];
    $payment_currency = $_POST['mc_currency'];
    $txn_id = $_POST['txn_id'];
    $receiver_email = $_POST['receiver_email'];
    $payer_email = $_POST['payer_email'];
    $id_user = $_POST['custom'];

    if (!$fp) {
    // ERREUR HTTP
    } else {
        fputs ($fp, $header . $req);
        while (!feof($fp)) {
            $res = fgets ($fp, 1024);
            if (strcmp (trim($res), "VERIFIED") == 0) {
                // transaction valide
                // vérifier que payment_status a la valeur Completed
                if ( $payment_status == "Completed") {
                    // vérifier que receiver_email est votre adresse email PayPal principale
                    if ( "julien.thomas018-vendeur@live.fr" == $receiver_email) {
                        // vérifier que payment_amount et payment_currency sont corrects
                        // traiter le paiement
                        file_put_contents('ok', print_r($_POST, true));
                        @mysql_connect("localhost", "root", "");
                        @mysql_select_db("multigaming");
                        @mysql_query("UPDATE membres SET points = points + '10' WHERE pseudo='" . $id_user . "'");
                    }

                    else {
                        // Mauvaise adresse email paypal
                        file_put_contents('bad_adress', print_r($_POST, true));
                    }
                }

                else {
                    // Statut de paiement: Echec
                    file_put_contents('echec', print_r($_POST, true));
                }
            }

            else if (strcmp (trim($res), "INVALID") == 0) {
                // Transaction invalide      
                file_put_contents('invalid', print_r($_POST, true));         
            }
        }
        file_put_contents('log', print_r($_POST, true));
        fclose ($fp);
    }



 ?>