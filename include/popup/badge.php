<?php
    function initSQL($server) {
        if ($server == 1) {
            $SQL = @mysql_connect ('localhost', 'root', '');
            @mysql_select_db('pstats', $SQL);
        }

        elseif ($server == 2) {
            $SQL = @mysql_connect ('localhost', 'root', '');
            @mysql_select_db('pstats', $SQL);
        }

        elseif ($server == 3) {
            $SQL = @mysql_connect ('localhost', 'root', '');
            @mysql_select_db('pstats', $SQL);
        }

        elseif ($server == 4) {
            $SQL = @mysql_connect ('localhost', 'root', '');
            @mysql_select_db('pstats', $SQL);
        }

        else {
            echo "WTF ?!";
        }
    }

    function callSQL($server, $table, $colonne) {
        initSQL($server);
        $queryID = 'SELECT player_id FROM stats_players WHERE name="'. $_SESSION['login'] .'"';
        $sendQueryID = @mysql_query($queryID) or die('Erreur SQL !<br />'.$queryID.'<br />'.@mysql_error());
        $getID = @mysql_fetch_array($sendQueryID);

        $requestGTA = 'SELECT ' . $colonne . ' FROM ' . $table . ' WHERE player_id="'. $getID['player_id'] .'"';
        $sendQueryGTA = @mysql_query($requestGTA) or die('Erreur SQL !<br />'.$requestGTA.'<br />'.@mysql_error());
        $resultGTA = @mysql_fetch_array($sendQueryGTA);
        if ($getID == NULL) {
            return "0";
        }
        else {
            return "$resultGTA[$colonne]";
        }
    }
?>

<div class="modal-wrapper" data-modal="wrapper_badge">
    <div class="modal-content badge_content">
        <button data-modal="close_badge" class="modal-close-button">&times;</button>
        <h2 class="title-popup">Liste de tout les badges :</h2>
        <ul id="tabs-badge">
            <li class="active">Liberty Story</li>
            <li>UprisingZ</li>
            <li>Pokecassé</li>
            <li>Mini-PasFini</li>
        </ul>
        <ul id="tab-badge">
            <li class="active">
                <div class="scrollbar-badge">
                    <div class="box-badge">
                        <h3>Badge LibertyStory</h3>
                        <img src="">
                        <p>ID : <?php echo callSQL(1, "stats_players", "player_id"); ?></p>
                        <p>Nb login : <?php echo callSQL(1, "stats_players", "logins"); ?></p>
                        <p>Playtime : <?php echo callSQL(1, "stats_players", "playtime"); ?></p>
                        <p>Distance à pied parcourue : <?php echo callSQL(1, "stats_distances", "foot"); ?>m</p>
                    </div>
                </div>
            </li>
            <li>
                <div class="scrollbar-badge">
                    <div class="box-badge">
                        <h3>Badge UprisingMerde</h3>
                        <img src="">
                        <p></p>
                    </div>
                </div>
            </li>
            <li>
                <div class="scrollbar-badge">
                    <div class="box-badge">
                        <h3>Badge Pokecassé</h3>
                        <img src="">
                        <p></p>
                    </div>
                    <div class="box-badge">
                        <h3>Badge Pokecassé</h3>
                        <img src="">
                        <p></p>
                    </div>
                    <div class="box-badge">
                        <h3>Badge Pokecassé</h3>
                        <img src="">
                        <p></p>
                    </div>
                </div>
            </li>
            <li>
                <div class="scrollbar-badge">
                    <div class="box-badge">
                        <h3>Badge Mini-PasFini</h3>
                        <img src="">
                        <p></p>
                    </div>
                    <div class="box-badge">
                        <h3>Badge Mini-PasFini</h3>
                        <img src="">
                        <p></p>
                    </div>
                    <div class="box-badge">
                        <h3>Badge Mini-PasFini</h3>
                        <img src="">
                        <p></p>
                    </div>
                    <div class="box-badge">
                        <h3>Badge Mini-PasFini</h3>
                        <img src="">
                        <p></p>
                    </div>
                    <div class="box-badge">
                        <h3>Badge Mini-PasFini</h3>
                        <img src="">
                        <p></p>
                    </div>
                    <div class="box-badge">
                        <h3>Badge Mini-PasFini</h3>
                        <img src="">
                        <p></p>
                    </div>
                    <div class="box-badge">
                        <h3>Badge Mini-PasFini</h3>
                        <img src="">
                        <p></p>
                    </div>
                    <div class="box-badge">
                        <h3>Badge Mini-PasFini</h3>
                        <img src="">
                        <p></p>
                    </div>
                    <div class="box-badge">
                        <h3>Badge Mini-PasFini</h3>
                        <img src="">
                        <p></p>
                    </div>
                    <div class="box-badge">
                        <h3>Badge Mini-PasFini</h3>
                        <img src="">
                        <p></p>
                    </div>
                    <div class="box-badge">
                        <h3>Badge Mini-PasFini</h3>
                        <img src="">
                        <p></p>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>

<script type="text/javascript">
    
var Popup_badge = (function() {

    var modalOpen = document.querySelector('[data-modal="open_badge"]'),
        modalClose = document.querySelector('[data-modal="close_badge"]'),
        modalWrapper = document.querySelector('[data-modal="wrapper_badge"]');

    return {
        init: function() {
            this.open();
            this.close();
        },

        open: function() {
            modalOpen.onclick = function(e) {
                e.preventDefault;
                modalWrapper.classList.add("modal-opened");
            }
        },

        close: function() {
            modalClose.onclick = function(e) {
                e.preventDefault;
                modalWrapper.classList.remove("modal-opened");
            }
        }
    }
}());

Popup_badge.init();

</script>