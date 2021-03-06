<?php
    session_start();
    include 'include/config.php';
    include 'include/connexion.php';
    include 'include/inscription.php';
    include 'include/geoloc/geoipcity.inc';
    include 'include/geoloc/geoipregionvars.php';
    include 'include/APIphpsend/PHPSend.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Accueil</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/css/components/progress.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/css/components/progress.gradient.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/css/components/progress.almost-flat.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet/less" type="text/css" href="css/style.less">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/2.24.3/js/uikit.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="js/tabs.js"></script>
        <script src="js/index.js"></script>
        <script src="js/less.min.js"></script>      
    </head>
    <body>

        <?php
            if (isset($_GET['paiement']) && $_GET['paiement'] == 'valide') {
        ?>
                <div class="alert alert-success alert-espace-membre">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Succès !</strong> Merci de votre achat !
                </div>
        <?php
            }else{}
        ?>

    <div class="modal-wrapper" data-modal="wrapper_notification"><div id="refresh_text" style="text-align: center;" class="modal-content">
</div></div>
    <div class="modal-wrapper vote_popup" data-modal="wrapper_vote"><div class="modal-content" id="refresh_vote">
    </div></div>

<?php 
        include 'include/envoyer_points.php';
?>
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
        <div class="copyright">Made with &hearts; | &copy; Multigaming 2015 - 2016</div> <!-- TEXTE FOOTER DU SITE -->
    </footer>

<?php
    if (isset($_SESSION['login'])) {
        include 'include/popup/envoyerPoints.php';
        include 'include/popup/addPoints.php';
        include 'include/popup/badge.php';
    } else {}
?>

    </body>
</html>

<!-- # LA SOLITUDE DU JS -->
<script src="js/pop_up.js"></script>