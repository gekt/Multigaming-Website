		    <div class="modal-wrapper vote_popup" data-modal="wrapper_vote">
            <div class="modal-content">
                <button data-modal="close_vote" class="modal-close-button">&times;</button>
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
						 	@mysql_select_db("multigaming"); // Sélection de la base de données
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
									<p id="revote"></p> 

						<?php
							}
							if (isset($_POST['vote_1'])) {
								if ($time_atm >= $time) {
									@mysql_query("UPDATE vote SET time='" . $time_cd . "' WHERE pseudo='". $player ."' ");
									$connect->PHPScommand("say " . $player . " vient de voter pour le serveur !");
									$connect->PHPScommand("give " . $player . " 42 64");
									header('Location: index.php');
								}
								else {}
							}
							$result = $connect->PHPSdisconnect();
						?>


                 <form action="index.php" method="post">
			        <input type="hidden" name="vote_1" value="<?php echo $time_cd; ?>">
			        <input type="<?php echo $hidden ?>" name="vote" value="voter" onclick="openVote()">
			     </form>
            </div>
        </div>

<script type="text/javascript" language="Javascript">
	$(document).ready(function(){
	    setInterval(function(){
	    	var TimeNow = new Date(Date.now() / 1000);
	    	var TimeCooldown = <?php echo json_encode($time); ?>;
	    	var TimeBeforeVote = TimeCooldown - TimeNow;

	    	if (TimeBeforeVote == 0) {
	    		$('#revote').text("Actualisez la page pour re voter !");
	    		if ($(".vote_popup").attr('class') == "modal-wrapper vote_popup modal-opened") {
	    			document.location = 'index.php';
	    		}
	    	}
	    	else if (TimeBeforeVote > 0) {
        		$('#revote').text("Vous pourrez re voter dans " + timeConverter(TimeBeforeVote));
	    	}
	    	else {
	    		$('#revote').text("Actualisez la page pour re voter !");
	    	}
    	}, 1000);
	});

	function timeConverter(UNIX_timestamp){
  		var a = new Date(UNIX_timestamp * 1000);
		var hour = (a.getHours() - 1) < 10 ? '0' + (a.getHours() - 1) : (a.getHours() - 1); 
		var min = a.getMinutes() < 10 ? '0' + a.getMinutes() : a.getMinutes(); 
		var sec = a.getSeconds() < 10 ? '0' + a.getSeconds() : a.getSeconds();
  		var time = hour + ':' + min + ':' + sec ;
  	return time;
}
</script>