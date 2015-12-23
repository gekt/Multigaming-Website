<?php
            @mysql_connect("localhost", "root", "");
            @mysql_select_db("multigaming");
            $sql = 'SELECT * FROM news WHERE serveur="pixelmon" ORDER BY date DESC';
            $req = @mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
            $nb = @mysql_num_rows($req);


       if ($nb == 0) {
            ?>
        <p>Aucune News</p>
<?php
        }
        else {
        while ($data = @mysql_fetch_array($req)) {
?>
            <p>
            <?php echo $data['titre'] ?>: <?php echo html_entity_decode(nl2br(htmlentities(trim($data['texte_news'])))) ?></br>de <?php echo html_entity_decode(nl2br(htmlentities(trim(($data['auteur']))))) ?> à <?php echo $data['date'] ?>
            </p>
<?php
        }
    }
    @mysql_free_result($req);
    @mysql_close();

?>