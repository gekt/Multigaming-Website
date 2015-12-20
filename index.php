<?php
    session_start();
    include 'include/config.php';
    include 'include/connexion.php';
    include 'include/inscription.php';
    include 'include/envoyer_points.php';
    include 'include/geoloc/geoipcity.inc';
    include 'include/geoloc/geoipregionvars.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Accueil</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/pop_up.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="js/tabs.js"></script>
        <script src="js/index.js"></script>        
    </head>
    <body>
        <div class="modal-wrapper" data-modal="wrapper">
            <div class="modal-content">
                <button data-modal="close">&times;</button>
                <form action="index.php" method="post">
                    Vous avez: <?php echo $nb_points; ?> Points</br>
                    Envoyer à : <input type="text" name="pseudo_destinataire"><br />
                    Nombres de points : <input type="text" name="points_envoyé"><br />
                    <input type="submit" name="envoie_points" value="Envoyer les points">    
                </form>
            </div>
        </div> 
        <div class="pour_le_footer">
            <header class="banniere"> <!-- BANNIERE DU HAUT DE PAGE (HEADER) SUR TOUT LA LARGEUR -->
                <div class="banniere_img">
                </div> <!-- IMAGE DE LA BANNIERE -->
            </header>

            <section class="contenu_page"> <!-- BODY DU SITE AVEC LE CONTENU DE LA PAGE (MENU ET SLIDER INFO SERVEUR) -->

                <div class="menu">  <!-- MENU CONNEXION/INSCRIPITION ET ESPACE MEMBRE -->
<?php
                    if (isset($_SESSION['login'])) {
                        include 'include/calcXP.php';
                        include 'include/connected.php';
                    }
                    else {
                        include 'include/notConnected.php';
                    }
?>
                </div>

                <div class="contenu_serveur"> <!-- SLIDER SERVEUR EN MILIEU DE PAGE DISPLAY INFO SERVEUR ET BLOC CENTRALE AVEC TRANSITION -->
<?php            
                include'include/slider.php'; 
?>
                </div>

            </section>
        </div>

    <footer class="footer"> <!-- FOOTER DU SITE -->
        <div class="copyright">Copyright Multigaming 2015 - 2016</div> <!-- TEXTE FOOTER DU SITE -->
    </footer>
    </body>
</html>







<!-- # LA SOLITUDE DU JS -->
<script src="js/pop_up.js"></script> 