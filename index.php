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
    </head>
    <body onload="selectTab(3);">
        <div class="pour_le_footer">
            <header class="banniere"> <!-- BANNIERE DU HAUT DE PAGE (HEADER) SUR TOUT LA LARGEUR -->
                <div class="banniere_img">
                </div> <!-- IMAGE DE LA BANNIERE -->
            </header>

            <section class="contenu_page"> <!-- BODY DU SITE AVEC LE CONTENU DE LA PAGE (MENU ET SLIDER INFO SERVEUR) -->

                <div class="menu">  <!-- MENU CONNEXION/INSCRIPITION ET ESPACE MEMBRE -->
                </div>

                <div class="contenu_serveur"> <!-- SLIDER SERVEUR EN MILIEU DE PAGE DISPLAY INFO SERVEUR -->
                <?php include'include/slider.php'; ?>
                </div>

            </section>
        </div>

    <footer class="footer"> <!-- FOOTER DU SITE -->
        <div class="copyright">Copyright Multigaming 2015 - 2016</div> <!-- TEXTE FOOTER DU SITE -->
    </footer>
    <video autoplay id="bgvid" loop>
        <source src="img/1.mp4" type="video/mp4">
    </video>
    </body>
</html>