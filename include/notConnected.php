                <form class="connexion" action="index.php" method="post">
                    <p class="connect_text">Connexion</p>
                    <div class="txt">
                        <input id="user" class="connect_pseudo_input" placeholder="Pseudo" type="text" name="login" value="<?php if (isset($_POST['login'])) echo htmlentities(trim($_POST['login'])); ?>">
                        <img src="img/user-icon.png" />
                    </div>
                    <div class="txt">
                       <input class="connect_mdp_input" placeholder="Mot de passe" type="password" name="pass" value="<?php if (isset($_POST['pass'])) echo htmlentities(trim($_POST['pass'])); ?>"><br />
                       <img src="img/lock-icon.png" />
                    </div>
                <input class="connect_bouton" type="submit" name="connexion" value="Connexion">
                <input class="register_bouton" id="bouton_toggle" type="button" name="s'inscrire" value="Inscription" onclick="">
                </form>

                <div id="inscription_toggle" style="display: none;">
                <form action="index.php" method="post">
                    <p class="inscription">Inscription</p>
                    <div class="txt">
                      <input class="inscription_pseudo" type="text" name="login" placeholder="Pseudo" value="<?php if (isset($_POST['login'])) echo htmlentities(trim($_POST['login'])); ?>"><br />
                      <img src="img/user-icon.png" />
                    </div>
                    <div class="txt">
                      <input class="inscription_mdp" type="password" name="pass" placeholder="Mot de passe" value="<?php if (isset($_POST['pass'])) echo htmlentities(trim($_POST['pass'])); ?>"><br />
                      <img src="img/lock-icon.png" />
                    </div>
                    <div class="txt">
                      <input class="inscription_mdp_confirm" type="password" name="pass_confirm" placeholder="Confirmer Mot de passe" value="<?php if (isset($_POST['pass_confirm'])) echo htmlentities(trim($_POST['pass_confirm'])); ?>"><br />
                      <img src="img/lock-icon.png" />
                    </div>
                    <input class="inscription_confirm" type="submit" name="inscription" value="S'inscrire">
                </form>
                </div>
                <?php 
                if ((isset($_POST['connexion'])) || (isset($_POST['inscription']))) {
                    ?>
                      <div class="alert alert-danger">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Erreur !</strong> <?php echo $erreur;?>
                      </div>
                    <?php
                }
                ?>