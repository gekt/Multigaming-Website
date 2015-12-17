                                                                <!-- [PLAYER CHECK] -->



<?php 
//--------------------------------------------------------------[GTA]--------------------------------------------------------------//
$ip = "62.210.244.80";
$port = 36598;
        $check = json_decode(file_get_contents('https://api.razex.de/server/status/' . $ip . ':' . $port . ''), true);
            $gta_player = $check['players']['online'];
?>

<?php 
//--------------------------------------------------------------[PIXELMON]--------------------------------------------------------------//
$ip2 = "62.210.244.80";
$port2 = 25565;
        $check2 = json_decode(file_get_contents('https://api.razex.de/server/status/' . $ip . ':' . $port . ''), true);
            $pixelmon_player = $check2['players']['online'];
?>

<?php 
//--------------------------------------------------------------[ZOMBIE]--------------------------------------------------------------//
$ip3 = "62.210.244.80";
$port3 = 1337;
        $check3 = json_decode(file_get_contents('https://api.razex.de/server/status/' . $ip . ':' . $port . ''), true);
            $uprisingz_player = $check3['players']['online'];
?>

<?php 
//--------------------------------------------------------------[MINI GAME]--------------------------------------------------------------//
$ip4 = "62.210.244.80";
$port4 = 1337;
        $check4 = json_decode(file_get_contents('https://api.razex.de/server/status/' . $ip . ':' . $port . ''), true);
            $minigame_player = $check4['players']['online'];
?>


                                                                                        <!-- [ONLINE CHECK] -->


<?php 
//--------------------------------------------------------------[GTA]--------------------------------------------------------------//
$ip = "62.210.244.80";
$port = 36598;
        $checkStatut = json_decode(file_get_contents('https://api.razex.de/server/status/' . $ip . ':' . $port . ''), true);
        $gta_status = $checkStatut['online'];
?>

<?php 
//--------------------------------------------------------------[PIXELMON]--------------------------------------------------------------//
$ip2 = "62.210.244.80";
$port2 = 25565;
        $checkStatut2 = json_decode(file_get_contents('https://api.razex.de/server/status/' . $ip2 . ':' . $port2 . ''), true);
        $pixelmon_status = $checkStatut2['online'];
?>

<?php 
//--------------------------------------------------------------[ZOMBIE]--------------------------------------------------------------//
$ip3 = "62.210.244.80";
$port3 = 1337;
        $checkStatut3 = json_decode(file_get_contents('https://api.razex.de/server/status/' . $ip3 . ':' . $port3 . ''), true);
        $zombie_status = $checkStatut3['online'];
?>

<?php 
//--------------------------------------------------------------[MINI GAME]--------------------------------------------------------------//
$ip4 = "62.210.244.80";
$port4 = 1337;
        $checkStatut4 = json_decode(file_get_contents('https://api.razex.de/server/status/' . $ip4 . ':' . $port4 . ''), true);
        $minigame_status = $checkStatut4['online'];
?>