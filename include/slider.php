<?php 
include 'include/check.php';
?>

<div id="choose_server">   
    <ul id="buttons">
        <li>
            <?php
            if ($gta_status == true) {
                ?>
                <img src="img/etiquette/online.png" id="etiquette">
                <p class="e_text"><?php echo $gta_player;?>/250</p>
                <?php
            } else {
                ?>
                <img src="img/etiquette/offline.png" id="etiquette">
                <p class="e_text">Hors-ligne</p>
                <?php
            }
            ?>
            <img src="img/slider_bouton/s1nb.png" id="tab1" onclick="selectTab(1); return false;">
        </li>
        <li>
            <?php
            if ($zombie_status == true) {
                ?>
                <img src="img/etiquette/online.png" id="etiquette2">
                <p class="e_text2"><?php echo $zombie_player;?>/250</p>
                <?php
            } else {
                ?>
                <img src="img/etiquette/offline.png" id="etiquette2">
                <p class="e_text2">Hors-ligne</p>
                <?php
            }
            ?>
            <img src="img/slider_bouton/s2nb.png" id="tab2" onclick="selectTab(2); return false;">
        </li>
        <li>
            <?php
            if ($pixelmon_status == true) {
                ?>
                <img src="img/etiquette/online.png" id="etiquette2">
                <p class="e_text2"><?php echo $pixelmon_player;?>/250</p>
                <?php
            } else {
                ?>
                <img src="img/etiquette/offline.png" id="etiquette2">
                <p class="e_text2">Hors-ligne</p>
                <?php
            }
            ?>
            <img src="img/slider_bouton/s3nb.png" id="tab3" onclick="selectTab(3); return false;">
        </li>
        <li>
            <?php
            if ($minigame_status == true) {
                ?>
                <img src="img/etiquette/online.png" id="etiquette2">
                <p class="e_text2"><?php echo $minigame_player;?>/250</p>
                <?php
            } else {
                ?>
                <img src="img/etiquette/offline.png" id="etiquette2">
                <p class="e_text2">Hors-ligne</p>
                <?php
            }
            ?>
            <img src="img/slider_bouton/s4nb.png" id="tab4" onclick="selectTab(4); return false;">
        </li>
    </ul>

    <div id="bloc_centrale">
        <div class="scrollbar">
            <h2>This is the first tab</h2>
            <h2>This is the first tab</h2>
            <h2>This is the first tab</h2>
            <h2>This is the first tab</h2>
            <h2>This is the first tab</h2>
            <h2>This is the first tab</h2>
            <h2>This is the first tab</h2>
            <h2>This is the first tab</h2>
            <h2>This is the first tab</h2>
            <h2>This is the first tab</h2>
            <h2>This is the first tab</h2>
            <h2>This is the first tab</h2>
            <h2>This is the first tab</h2>
            <h2>This is the first tab</h2>
            <h2>This is the first tab</h2>
            <h2>This is the first tab</h2>
            <h2>This is the first tab</h2>
            <h2>This is the first tab</h2>
            <h2>This is the first tab</h2>
            <h2>This is the first tab</h2>
            <h2>This is the first tab</h2>
        </div>
    </div>

    <div id="box1" class="infobox"> 
        <ul id="tabs">
            <li class="active">Description</li>
            <li>Launcher</li>
            <li>News/MaJ</li>
            <li>Règles/FAQ</li>
        </ul>
        <ul id="tab">
            <li class="active">
                <h2>This is the first tab</h2>
            </li>
            <li>
                <h2>This is the second tab</h2>
            </li>
            <li>
                <h2>Tab number three wee hee</h2>
            </li>
            <li>
                <h2>Fourth tab not bad</h2>
            </li>
        </ul>
    </div>

    <div id="box2" class="infobox">  
        <ul id="tabs">
            <li class="active">Description</li>
            <li>Launcher</li>
            <li>News/MaJ</li>
            <li>Règles/FAQ</li>
        </ul>
        <ul id="tab">
            <li class="active">
                <div class="scrollbar">
                    <h2>This is the first tab</h2>
                    <h2>This is the first tab</h2>
                    <h2>This is the first tab</h2>
                    <h2>This is the first tab</h2>
                    <h2>This is the first tab</h2>
                    <h2>This is the first tab</h2>
                    <h2>This is the first tab</h2>
                    <h2>This is the first tab</h2>
                    <h2>This is the first tab</h2>
                    <h2>This is the first tab</h2>
                    <h2>This is the first tab</h2>
                </div>
            </li>
            <li>
                <h2>This is the second tab</h2>
            </li>
            <li>
                <h2>Tab number three wee hee</h2>
            </li>
            <li>
                <h2>Fourth tab not bad</h2>
            </li>
        </ul>    
    </div>

    <div id="box3" class="infobox">
        <ul id="tabs">
            <li class="active">Description</li>
            <li>Launcher</li>
            <li>News/MaJ</li>
            <li>Règles/FAQ</li>
        </ul>
        <ul id="tab">
            <li class="active">
                <h2>This is the first tab</h2>
            </li>
            <li>
                <h2>This is the second tab</h2>
            </li>
            <li>
                <h2>Tab number three wee hee</h2>
            </li>
            <li>
                <h2>Fourth tab not bad</h2>
            </li>
        </ul>
    </div>

    <div id="box4" class="infobox">
        <ul id="tabs">
            <li class="active">Description</li>
            <li>Launcher</li>
            <li>News/MaJ</li>
            <li>Règles/FAQ</li>
        </ul>
        <ul id="tab">
            <li class="active">
                <h2>This is the first tab</h2>
            </li>
            <li>
                <h2>This is the second tab</h2>
            </li>
            <li>
                <h2>Tab number three wee hee</h2>
            </li>
            <li>
                <h2>Fourth tab not bad</h2>
            </li>
        </ul>
    </div>
</div>