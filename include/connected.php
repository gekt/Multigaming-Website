<?php
        $gi = geoip_open(realpath("include/geoloc/GeoLiteCity.dat"),GEOIP_STANDARD);
        if ($_SERVER['REMOTE_ADDR'] != '::1') {
            $record = geoip_record_by_addr($gi,$_SERVER['REMOTE_ADDR']);
            $code = geoip_country_code_by_addr($gi, $_SERVER['REMOTE_ADDR']);
            $pays = $record->country_name;

            $url = 'http://localhost:81/site_mg/img/flag/' . $code . '.png';
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
    <img class="avatar" style="border-radius: 5px;" src="https://minotar.net/avatar/<?php echo $_SESSION['login']; ?>/100.png"/>
    <p id="pseudo"><?php echo $_SESSION['login']; ?></p>
    <img src="/img/<?php echo $code; ?>.png">
    <p><?php echo $getLevel ?></p>
    <progress value="<?php echo $getPourcentage ?>" max="100"></progress>
</div>
<a href="deconnexion.php">Se déconnecter</a>