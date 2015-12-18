<?php
    $lvl_1 = 50; // 50
    $lvl_2 = 150; // 100
    $lvl_3 = 300; // 150
    $lvl_4 = 500; // 200
    $lvl_5 = 750; // 250
    $lvl_6 = 950; // 300
    $lvl_7 = 1300; // 350
    $lvl_8 = 1700; // 400
    $lvl_9 = 2150; // 450
    $lvl_10 = 2650; // 500
    $lvl_11 = 3200; // 550
    $lvl_12 = 3800; // 600
    $lvl_13 = 4450; // 650
    $lvl_14 = 5150; // 700
    $lvl_15 = 5900; // 750

    $getXPMySQL = @mysql_query ("SELECT * FROM membres WHERE pseudo='" . $_SESSION['login'] . "' ");
    while ($data = @mysql_fetch_array($getXPMySQL)) {
        $getXP = $data['xp'];
    }

    if ($getXP == 0) {
        $getPourcentage = 0;
        $getXPrequis = 50;
        $getLevel = 0;
        $getNextLevel = 1;
    }
    elseif ($getXP <= 50) {
        $getPourcentage = round($getXP * 100 / 50);
        $getXPrequis = (50 - $getXP) + 1;
        $getLevel = 0;
        $getNextLevel = 1;
    }
    else {
        for ($i = 1; $i <= 15; $i++) {
            if (${"lvl_" . $i} >= $getXP) {
                $getPourcentage = round($getXP * 100 / ${"lvl_" . $i});
                $getXPrequis = (${"lvl_" . $i} - $getXP) + 1;
                $getLevel = $i;
                $getNextLevel = $i + 1;
                break;
            }
        }
    }
?>