<?php 
    $checkadmin = @mysql_query ("SELECT * FROM membres WHERE pseudo='" . $_SESSION['login'] . "' ");
    while ($data = @mysql_fetch_array($checkadmin)) {
        $nb_points = $data['points'];
    }

?>

<?php
  $nb_destinataire = 0;
  if (isset($_POST['envoie_points'])) {
      $maintenance = @mysql_query ("SELECT points FROM membres WHERE pseudo='" . $_POST['pseudo_destinataire'] . "' ");
      while ($data = @mysql_fetch_array($maintenance)) 
          $nb_destinataire = $data['points'];

      if ($nb_points < $_POST['points_envoyé']) {
                ?>
        <p>Vous n'avez pas assez de points pour en envoyer!</p>
        <?php
         
      }
        if ($nb_destinataire == NULL) {
                  ?>
        <p><?php echo $_POST['pseudo_destinataire'];?> n'existe pas!</p>
        <?php
        }

      else {
        $update_points = "UPDATE membres SET points= points + '" . $_POST['points_envoyé'] . "'  WHERE pseudo='" . $_POST['pseudo_destinataire'] . "'";
        mysql_query($update_points) or die('Erreur SQL !'.$update_points.'<br />'.mysql_error());
        $update_points2 = "UPDATE membres SET points= points - '" . $_POST['points_envoyé'] . "'  WHERE pseudo='" . $_SESSION['login'] . "'";
        mysql_query($update_points2) or die('Erreur SQL !'.$update_points2.'<br />'.mysql_error());
        ?>
        <p>Vous avez envoyé <?php echo $_POST['points_envoyé']; ?> points à <?php echo $_POST['pseudo_destinataire'];?></p>
        <?php
      }
  }


?>
<!--<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="css/pop_up.css">
<div class="modal-wrapper" data-modal="wrapper">
  <div class="modal-content">
    <button data-modal="close">&times;</button>
    <form action="envoyer_points.php" method="post">
    Vous avez: <?php echo $nb_points; ?> Points</br>
    Envoyer à : <input type="text" name="pseudo_destinataire"><br />
    Nombres de points : <input type="text" name="points_envoyé"><br />
    	   <input type="submit" name="envoie_points" value="Envoyer les points">	
    </form>
  </div>
</div>
<button data-modal="open">Envoyer</button>
<script src="js/pop_up.js"></script>-->