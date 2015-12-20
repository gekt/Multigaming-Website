<?php
session_start();
include 'APIphpsend/PHPSend.php';
include 'include/config.php';
?>


		<meta charset="utf-8" />
		 <link rel="stylesheet" type="text/css" href="css/pop_up.css">
		 	<button data-modal="open">test</button>
		    <div class="modal-wrapper" data-modal="wrapper">
            <div class="modal-content">
                <button data-modal="close">&times;</button>
                <?php 
						$connect = new PHPSsend();
						$result = $connect->PHPSconnect("62.210.244.80","3fdd82fa8e07ee0a","11223");
						$player = $_SESSION['login'];
						//$connect->PHPScommand("give " . $player . " 42 64");
						$hidden = "false";
						?>

									<script type="text/javascript" language="Javascript">
										function openVote() {
											window.open('http://www.google.com', 'vote', 'width=500', 'height=500');
										}
									</script>

						<?php
						 	@mysql_connect("localhost", "root", ""); // Connexion à la base de données
						 	@mysql_select_db("espace_membres"); // Sélection de la base de données
						 	$check_exist = @mysql_query("SELECT pseudo FROM vote WHERE pseudo='" . $player . "'");
						 	if (@mysql_num_rows($check_exist) == 0) {
						 		@mysql_query("INSERT INTO vote (pseudo, time) VALUES ('". $player ."', 0)");
							}
							$reponse = @mysql_query ("SELECT * FROM vote WHERE pseudo='" . $player . "' "); // Requête SQL
							while ($donnees = @mysql_fetch_array($reponse)) // On boucle pour afficher toutes les données et on met toutes données dans un tableau
							{
								$time = $donnees['time'];
							}

							$time_atm = mktime(date("H") , date("i") , date("s") , date("m")  , date("d"), date("Y")); 
							$time_cd = mktime(date("H") + 2 , date("i") , date("s") , date("m")  , date("d"), date("Y"));

							if ($time_atm >= $time) {
									$hidden = "submit";
							}
							else {
									$hidden = "hidden"; 
						?>
									<p>Vous avez déja voté !</p>
									<p>Vous pourrez re voter à <?php echo date("H:i:s", $time);?> </p> 

						<?php
							}
							if (isset($_POST['vote_1'])) {
								if ($time_atm >= $time) {
									@mysql_query("UPDATE vote SET time='" . $time_cd . "' WHERE pseudo='". $player ."' ");
									$connect->PHPScommand("say " . $player . " vient de voter pour le serveur !");
									$connect->PHPScommand("give " . $player . " 42 64");
									?>
									<p>Merci pour votre vote !</p>
									<script>var snd = new Audio("musique/spartiate.mp3"); // buffers automatically when created
						        	snd.play();</script>
									<?php
									$hidden = "hidden";
								}
								else {}
							}
							$result = $connect->PHPSdisconnect();
						?>


                 <form action="test.php" method="post">
			        <input type="hidden" name="vote_1" value="<?php echo $time_cd; ?>">
			        <input type="<?php echo $hidden ?>" name="vote" value="voter" onclick="openVote()">
			        </form>

			        <a href="membre.php">Retour</a>
            </div>
        </div> 

       



        <script src="js/pop_up.js"></script>



