<?php 
include 'include/check.php';
?>

<?php  // CHANGER LES VARIABLE $CHECK EN NOMSERVER_PLAYER (POUR JUJU LE PD)
$gta_player = $check;
?>



<div id="choose_server">   
    <ul id="buttons"> 
        <li><a href="#" id="tab1" onclick="selectTab(1); return false;" onfocus="blur();"><span class="valign"></br></br></br></br></br>Joueurs en ligne: <?php echo $gta_player; ?>/250</span></a></li>
        <li><a href="#" id="tab2" onclick="selectTab(2); return false;" onfocus="blur();"><span class="valign"></br></br></br></br></br>Joueurs en ligne: 0/250</span></a></li>
        <li><a href="#" id="tab3" onclick="selectTab(3); return false;" onfocus="blur();"><span class="valign"></br></br></br></br></br>Joueurs en ligne: 0/250</span></a></li>
        <li><a href="#" id="tab4" onclick="selectTab(4); return false;" onfocus="blur();"><span class="valign"></br></br></br></br></br>Soon</span></a></li>
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