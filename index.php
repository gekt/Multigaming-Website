<?php 

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Accueil</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src="js/tabs.js"></script>    
        <script language="JavaScript" type="text/javascript">
            function selectTab(num) {
              for (var i=1; i <= 4; i++) {
                document.getElementById("tab" + i).className = "";
                document.getElementById("box" + i).className = "infobox";
              }
              document.getElementById("tab" + num).className = "selected";
              document.getElementById("box" + num).className = "infobox enabled";
            }
        </script>
<script>
$(document).ready(function(){
    $("#bouton_toggle").click(function(){
        $("#inscription").toggle();
    });
});
</script>
    </head>
    <body onload="selectTab(1);">
        <div class="pour_le_footer">
            <header class="banniere"> <!-- BANNIERE DU HAUT DE PAGE (HEADER) SUR TOUT LA LARGEUR -->
                <div class="banniere_img">
                </div> <!-- IMAGE DE LA BANNIERE -->
            </header>

            <section class="contenu_page"> <!-- BODY DU SITE AVEC LE CONTENU DE LA PAGE (MENU ET SLIDER INFO SERVEUR) -->

                <div class="menu">  <!-- MENU CONNEXION/INSCRIPITION ET ESPACE MEMBRE -->
	
                <div class="connect">
                <form action="connexion.php" method="post">
					<p class="connect_pseudo">CONNEXION :</p><input class="connect_pseudo_input" placeholder="Ex : Pseudo" type="text" name="login" value="<?php if (isset($_POST['login'])) echo htmlentities(trim($_POST['login'])); ?>"><br />
					<input class="connect_mdp_input" placeholder="Ex : mot de passe" type="password" name="pass" value="<?php if (isset($_POST['pass'])) echo htmlentities(trim($_POST['pass'])); ?>"><br />
				<input class="connect_bouton" type="submit" name="connexion" value="Connexion">
                <input class="register_bouton" id="bouton_toggle" type="button" name="s'inscrire" value="Inscription" onclick="">
				</form>
				</div>

			    <div id="inscription" style="display: none;">
			    	<div id="triangle"></div>
                <form action="inscription.php" method="post">
		            <p class="INSCRIPTION_INSCRIPTION">INSCRIPTION :</p>
		            <input class="inscription_pseudo" type="text" name="login" placeholder="Ex : Pseudo" value="<?php if (isset($_POST['login'])) echo htmlentities(trim($_POST['login'])); ?>"><br />
		            <input class="inscription_mdp" type="password" name="pass" placeholder="Ex : Mot de passe" value="<?php if (isset($_POST['pass'])) echo htmlentities(trim($_POST['pass'])); ?>"><br />
		            <input class="inscription_mdp_confirm" type="password" name="pass_confirm" placeholder="Ex : Confirmer Mot de passe" value="<?php if (isset($_POST['pass_confirm'])) echo htmlentities(trim($_POST['pass_confirm'])); ?>"><br />
					<input class="inscription_confirm" type="submit" name="inscription" value="S'inscrire">
				</form>
				</div>

                </div>

                <div class="contenu_serveur"> <!-- SLIDER SERVEUR EN MILIEU DE PAGE DISPLAY INFO SERVEUR -->
                <?php include'include/slider.php'; ?>
                </div>

            </section>
        </div>

    <footer class="footer"> <!-- FOOTER DU SITE -->
        <div class="copyright">Copyright Multigaming 2015 - 2016</div> <!-- TEXTE FOOTER DU SITE -->
    </footer>
    </body>
</html>