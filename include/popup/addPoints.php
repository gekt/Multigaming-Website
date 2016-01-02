<div class="modal-wrapper" data-modal="wrapper_add_points">
    <div class="modal-content">
        <button data-modal="close_add_points" class="modal-close-button">&times;</button>
        <div id="starpass-paiement" style="display: none;">
            <button class="bt-starpass-toggle bt-retour">&#11013; Retour</button>
            <?php 
                $points_starpass = "10";
            ?>
            <div id="starpass_340140"></div><script type="text/javascript" src="http://script.starpass.fr/script.php?idd=340140&amp;datas=<?php echo $_SESSION['login'];?>&amp;last=1&amp;theme=default_blue_small&amp;introtext=0"></script>
        </div>
        <div id="global-box-p">
            <h2 class="title-popup">Liste des offres disponibles :</h2>
            <div class="scrollbar-addpoints">
                <div class="box-p">
                    <h2 class="title-p">200 Points</h2>
                    <img class="img-p" src="img/offre_1.png">
                    <p id="price-p-50" class="price-text">2.00 €</p>
                    <button class="bt-starpass bt-starpass-toggle">Starpass</button>
                    <form id="bt-paypal" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="BRLUC7DF4ZRCL">
                        <input type="hidden" name="custom" value="<?php echo $_SESSION['login']; ?>"/>
                        <input type="image" src="https://checkout.paypal.com/pwpp/1.6.1/images/pay-with-paypal.png" width="100px" border="0" name="submit" alt="PayPal, le réflexe sécurité pour payer en ligne">
                        <img alt="" border="0" src="https://www.sandbox.paypal.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
                    </form>
                </div>
                <div class="box-p">
                    <h2 class="title-p">500 Points</h2>
                    <img class="img-p" src="img/offre_2.png">
                    <p id="price-p-50" class="price-text">5.00 €</p>
                    <form id="bt-paypal" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="BRLUC7DF4ZRCL">
                        <input type="hidden" name="custom" value="<?php echo $_SESSION['login']; ?>"/>
                        <input type="image" src="https://checkout.paypal.com/pwpp/1.6.1/images/pay-with-paypal.png" width="100px" border="0" name="submit" alt="PayPal, le réflexe sécurité pour payer en ligne">
                        <img alt="" border="0" src="https://www.sandbox.paypal.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
                    </form>
                </div>
                <div class="box-p">
                    <h2 class="title-p">1100 Points</h2>
                    <img class="img-p" src="img/offre_3.png">
                    <p id="price-p-50" class="price-text">10.00 €</p>
                    <form id="bt-paypal" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="BRLUC7DF4ZRCL">
                        <input type="hidden" name="custom" value="<?php echo $_SESSION['login']; ?>"/>
                        <input type="image" src="https://checkout.paypal.com/pwpp/1.6.1/images/pay-with-paypal.png" width="100px" border="0" name="submit" alt="PayPal, le réflexe sécurité pour payer en ligne">
                        <img alt="" border="0" src="https://www.sandbox.paypal.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
                    </form>
                </div>
                <div class="box-p">
                    <h2 class="title-p">1700 Points</h2>
                    <img class="img-p" src="img/offre_3.png">
                    <p id="price-p-50" class="price-text">15.00 €</p>
                    <form id="bt-paypal" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="BRLUC7DF4ZRCL">
                        <input type="hidden" name="custom" value="<?php echo $_SESSION['login']; ?>"/>
                        <input type="image" src="https://checkout.paypal.com/pwpp/1.6.1/images/pay-with-paypal.png" width="100px" border="0" name="submit" alt="PayPal, le réflexe sécurité pour payer en ligne">
                        <img alt="" border="0" src="https://www.sandbox.paypal.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
                    </form>
                </div>
                <div class="box-p">
                    <h2 class="title-p">2500 Points</h2>
                    <img class="img-p" src="img/offre_3.png">
                    <p id="price-p-50" class="price-text">20.00 €</p>
                    <form id="bt-paypal" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="BRLUC7DF4ZRCL">
                        <input type="hidden" name="custom" value="<?php echo $_SESSION['login']; ?>"/>
                        <input type="image" src="https://checkout.paypal.com/pwpp/1.6.1/images/pay-with-paypal.png" width="100px" border="0" name="submit" alt="PayPal, le réflexe sécurité pour payer en ligne">
                        <img alt="" border="0" src="https://www.sandbox.paypal.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>