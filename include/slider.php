<?php 
include 'include/check.php';
?>

<?php  // CHANGER LES VARIABLE $CHECK EN NOMSERVER_PLAYER (POUR JUJU LE PD)
$gta_player = $check;
?>

<div id="choose_server">   
    <ul id="buttons">
        <li><img src="img/slider_bouton/s1nb.png" id="tab1" onclick="selectTab(1); return false;"></li>
        <li><img src="img/slider_bouton/s2nb.png" id="tab2" onclick="selectTab(2); return false;"></li>
        <li><img src="img/slider_bouton/s3nb.png" id="tab3" onclick="selectTab(3); return false;"></li>
        <li><img src="img/slider_bouton/s4nb.png" id="tab4" onclick="selectTab(4); return false;"></li>
    </ul>

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