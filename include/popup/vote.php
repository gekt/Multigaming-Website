<?php
    session_start();
    $time_now = mktime(date("H"), date("i"), date("s"), date("m"), date("d"), date("Y")); // On recupère le temps actuel
    $time_revote = mktime(date("H") + 2, date("i"), date("s"), date("m"), date("d"), date("Y")); // On récupère le temps actuel et on ajoute 2h
    
    function initSQL() {
        $SQL = @mysql_connect ('localhost', 'root', '');
        @mysql_select_db('multigaming', $SQL);
    }

    function getTimeLatest($table) {
        initSQL();
        $checkExist = 'SELECT pseudo FROM ' . $table . ' WHERE pseudo="'. $_SESSION['login'] .'"'; // Check si le joueur est dans la table $table
        if (@mysql_num_rows($checkExist) == 0) { // Si le joueur n'est pas dans la table $table
            @mysql_query('INSERT INTO ' . $table . ' (pseudo, time) VALUES ("' . $_SESSION['login'] . '", 0)'); // Alors on l'inscris dans la table
        }
        $hasVoted = @mysql_query('SELECT * FROM ' . $table . ' WHERE pseudo="' . $_SESSION['login'] . '"');
        while ($data = @mysql_fetch_array($hasVoted)) {
            $time_latest = $data['time']; // On recupère le temps du dernier vote (0 si aucun vote)
            return $time_latest;
            break;
        }
    }

    function canVote($table) {
        global $time_now;
        if ($time_now >= getTimeLatest($table)) { // On check si le joueur peut revoter
            return true; // Il peut voter
        }
        else {
            return false; // Il ne peut pas voter
        }
    }

    function getPercent($table) {
        global $time_now;
        $timeBeforeVoteSeconds = 7200;
        $substract = getTimeLatest($table) - $time_now;
        $percent = $substract * 100 / $timeBeforeVoteSeconds;
        return round($percent);
    }
?>
        <script src="js/pop_up.js"></script> 
        <button data-modal="close_vote" class="modal-close-button">&times;</button>
        <h2 class="title-popup">Vote pour un serveur :</h2>
        <h5 class="desc-vote">(Recevez une récompense directement sur le serveur en votant !)</h5>
            <script type="text/javascript" language="Javascript">
                function openVote() {
                    window.open('http://www.google.com', 'vote', 'width=500', 'height=500');
                }
            </script>
            <div class="vote_content">
                <div class="box-vote">
                    <h3 class="subtitle-vote">Liberty Story</h3>
                    <?php
                        if (canVote('vote_ls') == true) {
                    ?>
                            <form action="include/checkVote.php" method="post">
                                <input type="hidden" name="server" value="1">
                                <input class="img-vote-bt" type="submit" name="vote" value="" onclick="openVote()">
                                <input type="hidden" name="time_latest" value="<?php echo getTimeLatest('vote_ls'); ?>">
                                <input type="hidden" name="time_now" value="<?php echo $time_now; ?>">
                                <input type="hidden" name="time_revote" value="<?php echo $time_revote; ?>">
                            </form>
                    <?php
                        } else {
                    ?>
                            <div class="radial-progress" data-progress="<?php echo getPercent('vote_ls'); ?>">
                                <div class="circle">
                                    <div class="mask full">
                                        <div class="fill"></div>
                                    </div>
                                    <div class="mask half">
                                        <div class="fill"></div>
                                        <div class="fill fix"></div>
                                    </div>
                                    <div class="shadow"></div>
                                </div>
                                <div class="inset">
                                    <div class="percentage" id="revote_ls"></div>
                                </div>
                            </div>
                    <?php
                        }
                    ?>
                </div>
                <div class="box-vote">
                    <h3 class="subtitle-vote">UprisingZ</h3>
                    <?php
                        if (canVote('vote_uz') == true) {
                    ?>
                            <form action="include/checkVote.php" method="post">
                                <input type="hidden" name="server" value="2">
                                <input class="img-vote-bt" type="submit" name="vote" value="" onclick="openVote()">
                                <input type="hidden" name="time_latest" value="<?php echo getTimeLatest('vote_uz'); ?>">
                                <input type="hidden" name="time_now" value="<?php echo $time_now; ?>">
                                <input type="hidden" name="time_revote" value="<?php echo $time_revote; ?>">
                            </form>
                    <?php
                        } else {
                    ?>
                            <div class="radial-progress" data-progress="<?php echo getPercent('vote_uz'); ?>">
                                <div class="circle">
                                    <div class="mask full">
                                        <div class="fill"></div>
                                    </div>
                                    <div class="mask half">
                                        <div class="fill"></div>
                                        <div class="fill fix"></div>
                                    </div>
                                    <div class="shadow"></div>
                                </div>
                                <div class="inset">
                                    <div class="percentage" id="revote_uz"></div>
                                </div>
                            </div>
                    <?php
                        }
                    ?>
                </div>
                <div class="box-vote">
                    <h3 class="subtitle-vote">Pokedia</h3>
                    <?php
                        if (canVote('vote_pd') == true) {
                    ?>
                            <form action="include/checkVote.php" method="post">
                                <input type="hidden" name="server" value="3">
                                <input class="img-vote-bt" type="submit" name="vote" value="" onclick="openVote()">
                                <input type="hidden" name="time_latest" value="<?php echo getTimeLatest('vote_pd'); ?>">
                                <input type="hidden" name="time_now" value="<?php echo $time_now; ?>">
                                <input type="hidden" name="time_revote" value="<?php echo $time_revote; ?>">
                            </form>
                    <?php
                        } else {
                    ?>
                            <div class="radial-progress" data-progress="<?php echo getPercent('vote_pd'); ?>">
                                <div class="circle">
                                    <div class="mask full">
                                        <div class="fill"></div>
                                    </div>
                                    <div class="mask half">
                                        <div class="fill"></div>
                                        <div class="fill fix"></div>
                                    </div>
                                    <div class="shadow"></div>
                                </div>
                                <div class="inset">
                                    <div class="percentage" id="revote_pd"></div>
                                </div>
                            </div>
                    <?php
                        }
                    ?>
                </div>
                <div class="box-vote">
                    <h3 class="subtitle-vote">Mini-game</h3>
                    <?php
                        if (canVote('vote_mg') == true) {
                    ?>
                            <form action="include/checkVote.php" method="post">
                                <input type="hidden" name="server" value="4">
                                <input class="img-vote-bt" type="submit" name="vote" value="" onclick="openVote()">
                                <input type="hidden" name="time_latest" value="<?php echo getTimeLatest('vote_mg'); ?>">
                                <input type="hidden" name="time_now" value="<?php echo $time_now; ?>">
                                <input type="hidden" name="time_revote" value="<?php echo $time_revote; ?>">
                            </form>
                    <?php
                        } else {
                    ?>
                            <div class="radial-progress" data-progress="<?php echo getPercent('vote_mg'); ?>">
                                <div class="circle">
                                    <div class="mask full">
                                        <div class="fill"></div>
                                    </div>
                                    <div class="mask half">
                                        <div class="fill"></div>
                                        <div class="fill fix"></div>
                                    </div>
                                    <div class="shadow"></div>
                                </div>
                                <div class="inset">
                                    <div class="percentage" id="revote_mg"></div>
                                </div>
                            </div>
                    <?php
                        }
                    ?>
                </div>
            </div>

<script type="text/javascript" language="Javascript">
    $('head style[type="text/css"]').attr('type', 'text/less');
    less.refreshStyles();

    var TimeNow = new Date(Date.now() / 1000);

    var TimeCooldown_ls = <?php echo json_encode(getTimeLatest('vote_ls')); ?>;
    var TimeCooldown_uz = <?php echo json_encode(getTimeLatest('vote_uz')); ?>;
    var TimeCooldown_pd = <?php echo json_encode(getTimeLatest('vote_pd')); ?>;
    var TimeCooldown_mg = <?php echo json_encode(getTimeLatest('vote_mg')); ?>;

    var TimeBeforeVote_ls = TimeCooldown_ls - TimeNow;
    var TimeBeforeVote_uz = TimeCooldown_uz - TimeNow;
    var TimeBeforeVote_pd = TimeCooldown_pd - TimeNow;
    var TimeBeforeVote_mg = TimeCooldown_mg - TimeNow;

    $('#revote_ls').text(timeConverter(TimeBeforeVote_ls));
    $('#revote_uz').text(timeConverter(TimeBeforeVote_uz));
    $('#revote_pd').text(timeConverter(TimeBeforeVote_pd));
    $('#revote_mg').text(timeConverter(TimeBeforeVote_mg));

    function timeConverter(UNIX_timestamp){
        var a = new Date(UNIX_timestamp * 1000);
        var hour = (a.getHours() - 1) < 10 ? '0' + (a.getHours() - 1) : (a.getHours() - 1); 
        var min = a.getMinutes() < 10 ? '0' + a.getMinutes() : a.getMinutes(); 
        var sec = a.getSeconds() < 10 ? '0' + a.getSeconds() : a.getSeconds();
        var time = hour + ':' + min + ':' + sec ;
    return time;
    }
</script>