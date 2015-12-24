<div class="modal-wrapper" data-modal="wrapper_add_points">
    <div class="modal-content add_points_content">
        <button data-modal="close_add_points" class="modal-close-button">&times;</button>
        <div id="starpass-paiement" style="display: none;">
            <button class="bt-starpass-toggle">&larr;</button>
            <?php 
                $points_starpass = "10";
            ?>
            <div id="starpass_340140"></div><script type="text/javascript" src="http://script.starpass.fr/script.php?idd=340140&amp;datas=<?php echo $_SESSION['login'];?>"></script>
        </div>
        <div id="global-box-p">
            <div class="box-p" id="50-p">
                <h2 class="title-p">50 Points</h2>
                <img class="img-p" src="img/muffin.jpg">
                <p id="price-p-50">2.00 €</p>
                <button class="bt-starpass bt-starpass-toggle">Starpass</button>
                <form id="bt-paypal" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
                    <input type="hidden" name="cmd" value="_s-xclick">
                    <input type="hidden" name="hosted_button_id" value="BRLUC7DF4ZRCL">
                    <input type="hidden" name="custom" value="<?php echo $_SESSION['login']; ?>"/>
                    <input type="image" src="https://checkout.paypal.com/pwpp/1.6.1/images/pay-with-paypal.png" width="100px" border="0" name="submit" alt="PayPal, le réflexe sécurité pour payer en ligne">
                    <img alt="" border="0" src="https://www.sandbox.paypal.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
                </form>
            </div>
            <div class="box-p" id="100-p">
                sgsg
            </div>
            <div class="box-p" id="150-p">
                srfdgs
            </div>
        </div>
    </div>
</div>