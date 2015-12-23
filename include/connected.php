<?php
        $gi = geoip_open(realpath("include/geoloc/GeoLiteCity.dat"),GEOIP_STANDARD);
        if ($_SERVER['REMOTE_ADDR'] != '::1') {
            $record = geoip_record_by_addr($gi,$_SERVER['REMOTE_ADDR']);
            $code = geoip_country_code_by_addr($gi, $_SERVER['REMOTE_ADDR']);
            $pays = $record->country_name;

            $url = 'http://' . $_SERVER['SERVER_ADDR'] . ':' . $_SERVER['SERVER_PORT'] . '/site_mg/img/flag/' . $code . '.png';
            $headers = get_headers($url, 1);
            if ($headers[0] == 'HTTP/1.1 404 Not Found') {
                $code = "Unknown";
            }
        }
        else {
            $pays = "Localhost";
            $code = "Unknown";
        }
        geoip_close($gi);
?>

<div id="membre">
    <div id="notif_img" data-modal="open_notification"></div>
    <img class="avatar" style="border-radius: 5px;" src="https://minotar.net/avatar/<?php echo $_SESSION['login']; ?>/80.png"/>
    <p id="pseudo"><?php echo $_SESSION['login']; ?></p>
    <div class="badge">
        <span class="badge_lvl"><?php echo $getLevel ?></span>
    </div>
    <progress value="<?php echo $getPourcentage ?>" max="100"></progress>
    <span class="progressbar_text"><?php echo $getPourcentage ?> %</span>
    <p class="points_text">Tes points : <span class="points_number"><?php echo $nb_points ?></span></p>
    <button class="bt-membre add-points">Ajouter</button>
    <button class="bt-membre send-points" data-modal="open_send_points">Envoyer</button>
    <button class="bt-membre bt-badges">Badges</button>
    <!--<button class="bt-membre bt-messagerie">Messagerie</button>-->
    <button class="bt-membre bt-boutique">Boutique</button>
    <button class="bt-membre bt-vote" data-modal="open_vote">Vote</button>
    <button class="bt-membre bt-deconnexion"onclick="location.href='deconnexion.php';">Déconnexion</button>
    <img class="flag-membre" src="img/flag/<?php echo $code; ?>.png">
</div>