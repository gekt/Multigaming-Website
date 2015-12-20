<?php
session_start();
include 'include/config.php';
// on vérifie toujours qu'il s'agit d'un membre qui est connecté
if (!isset($_SESSION['login'])) {
	// si ce n'est pas le cas, on le redirige vers l'accueil
	header ('Location: index.php');
	exit();
}
include 'include/sessionid.php';

// on teste si le formulaire a bien été soumis
if (isset($_POST['go']) && $_POST['go'] == 'Envoyer') {
	if (empty($_POST['destinataire']) || empty($_POST['titre']) || empty($_POST['message'])) {
	$erreur = 'Au moins un des champs est vide.';
	}
	else {
	$base = @mysql_connect ('localhost', 'root', '');
	@mysql_select_db ('espace_membres', $base);

	// si tout a été bien rempli, on insère le message dans notre table SQL
	$sql = 'INSERT INTO messages VALUES("", "'.$id.'", "'.$_POST['destinataire'].'", "'.date("Y-m-d H:i:s").'", "'.mysql_escape_string($_POST['titre']).'", "'.mysql_escape_string($_POST['message']).'", "1")';
	@mysql_query($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());

	@mysql_close();

	header('Location: membre.php');
	exit();
	}
}
?>
			<link rel="stylesheet" type="text/css" href="css/pop_up.css">
			<link rel="stylesheet" type="text/css" href="css/style_tab.css">
			<link rel="stylesheet" type="text/css" href="css/simpletabs.css">
			<script type="text/javascript" src="js/simpletabs_1.3.js"></script>
			<button data-modal="open">test</button>

			        <div class="modal-wrapper" data-modal="wrapper">
			            <div class="modal-content">
			                <button data-modal="close">&times;</button>
			                	<html>
							<head>
							<title>Espace membre</title>
							<meta charset="utf-8" />
							</head>
							 <div class="simpleTabs">
							    <ul class="simpleTabsNavigation">
							      <li><a href="#">Envoyer un message</a></li>
							      <li><a href="#">Liste des messages</a></li>
							      <li><a href="#">lire</a></li>
							    </ul>
							<div class="simpleTabsContent">
							     <body>
							<a href="membre.php">Retour à l'accueil</a><br /><br />
							Envoyer un message :<br /><br />

							<?php
							$base = @mysql_connect ('localhost', 'root', '');
							@mysql_select_db ('espace_membres', $base);

							// on prépare une requete SQL selectionnant tous les login des membres du site en prenant soin de ne pas selectionner notre propre login, le tout, servant à alimenter le menu déroulant spécifiant le destinataire du message
							$sql = 'SELECT membre.login as nom_destinataire, membre.id as id_destinataire FROM membre WHERE id <> "'.$id.'" ORDER BY login ASC';
							// on lance notre requete SQL
							$req = @mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
							$nb = @mysql_num_rows ($req);

							if ($nb == 0) {
								// si aucun membre n'a été trouvé, on affiche tout simplement aucun formulaire
								echo 'Vous êtes le seul membre inscrit.';
							}
							else {
								// si au moins un membre qui n'est pas nous même a été trouvé, on affiche le formulaire d'envoie de message
								?>
								<form action="test.php" method="post">
								Pour : <select name="destinataire">
								<?php
								// on alimente le menu déroulant avec les login des différents membres du site
								while ($data = mysql_fetch_array($req)) {
								echo '<option value="' , $data['id_destinataire'] , '">' , stripslashes(htmlentities(trim($data['nom_destinataire']))) , '</option>';
								}
								?>
								</select><br />
								Titre : <input type="text" name="titre" value="<?php if (isset($_POST['titre'])) echo stripslashes(htmlentities(trim($_POST['titre']))); ?>"><br />
								Message : <textarea name="message"><?php if (isset($_POST['message'])) echo stripslashes(htmlentities(trim($_POST['message']))); ?></textarea><br />
								<input type="submit" name="go" value="Envoyer">
								</form>
								<?php
							}
							mysql_free_result($req);
							mysql_close();
							?>
							</select>

							<br /><br /><a href="deconnexion.php">Déconnexion</a>
							<?php
							// si une erreur est survenue lors de la soumission du formulaire, on l'affiche
							if (isset($erreur)) echo '<br /><br />',$erreur;
							?>
							</body>
							</html>
					        </div>
					         <div class="simpleTabsContent">
								<?php //messagerie
							            @mysql_connect("localhost", "root", ""); // Connexion à la base de données
							            @mysql_select_db("espace_membres"); // Sélection de la base de données
							        // on prépare une requete SQL cherchant tous les titres, les dates ainsi que l'auteur des messages pour le membre connecté
							        $sql = 'SELECT titre, date, membre.login as expediteur, messages.id as id_message FROM messages, membre WHERE id_destinataire="'.$id.'" AND id_expediteur=membre.id ORDER BY date DESC';
							        // lancement de la requete SQL
							        $req = @mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
							        $nb = @mysql_num_rows($req);

							        if ($nb == 0) {
							            ?>
							    <!--<p>Vous n'avez aucun message.</p>-->
							    <?php
							        }
							        else {
							        // si on a des messages, on affiche la date, un lien vers la page lire.php ainsi que le titre et l'auteur du message
							        while ($data = @mysql_fetch_array($req)) {
							            ?>
							            <p>
							            <?php echo $data['date'] ?>: <a href="lire.php?id_message=<?php echo $data['id_message'];?>"> <?php echo stripslashes(htmlentities(trim($data['titre'])))?> </a>[ Message de <?php echo stripslashes(htmlentities(trim($data['expediteur'])))?> ]<br />
							            </p>
							        <!--echo $data['date'] , ' - <a href="lire.php?id_message=' , $data['id_message'] , '">' , stripslashes(htmlentities(trim($data['titre']))) , '</a> [ Message de ' , stripslashes(htmlentities(trim($data['expediteur']))) , ' ]<br />';-->
							        <?php
							        }
							    }
							    @mysql_free_result($req);
							    @mysql_close();

							    //fin de messagerie?>
								</div>

								<div class="simpleTabsContent">
									   <?php
								// on vérifie toujours qu'il s'agit d'un membre qui est connecté
								if (!isset($_SESSION['login'])) {
									// si ce n'est pas le cas, on le redirige vers l'accueil
									header ('Location: index.php');
									exit();
								}
								include 'sessionid.php';

								$id_message = $_GET['id_message'];
								?>

								<html>
								<head>
								<title>Espace membre</title>
								<meta charset="utf-8" />
								</head>

								<body>
								<a href="membre.php">Retour à l'accueil</a><br /><br />
								<?php
								// on teste si notre paramètre existe bien et qu'il n'est pas vide
								if (!isset($_GET['id_message']) || empty($_GET['id_message'])) {
									echo 'Aucun message reconnu.';
								}
								else {
									$base = @mysql_connect ('localhost', 'root', '');
									@mysql_select_db ('espace_membres', $base);

									// on prépare une requete SQL selectionnant la date, le titre et l'expediteur du message que l'on souhaite lire, tout en prenant soin de vérifier que le message appartient bien au membre connecté
									$sql = 'SELECT titre, date, message, membre.login as expediteur FROM messages, membre WHERE id_destinataire="'.$id.'" AND id_expediteur=membre.id AND messages.id="'.$_GET['id_message'].'"';
									// on lance cette requete SQL à MySQL
									$req = @mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
									$nb = @mysql_num_rows($req);

									if ($nb == 0) {
									echo 'Aucun message reconnu.';
									}
									else {
									// si le message a été trouvé, on l'affiche
									$data = mysql_fetch_array($req);
									echo $data['date'] , ' - ' , stripslashes(htmlentities(trim($data['titre']))) , '</a> [ Message de ' , stripslashes(htmlentities(trim($data['expediteur']))) , ' ]<br /><br />';
									echo nl2br(stripslashes(htmlentities(trim($data['message']))));

									// on affiche également un lien permettant de supprimer ce message de la boite de réception
									echo '<br /><br /><a href="supprimer.php?id_message=' , $_GET['id_message'] , '">Supprimer ce message</a>';
									}
									mysql_free_result($req);
								}
								?>

								<?php 
									if (!isset($_GET['id_message']) || empty($_GET['id_message'])) {
									echo '';
									}
									else {
								    	@mysql_connect("localhost", "root", ""); // Connexion à la base de données
								 		@mysql_select_db("espace_membres"); // Sélection de la base de données
										@mysql_query ("UPDATE messages SET isread='0' WHERE id='" . $id_message . "'"); // Requête SQL
									}
									mysql_close();
								?>

								<?php 


								?>







								<br /><br /><a href="deconnexion.php">Déconnexion</a>
								</body>
								</html>
								</div>
							
			            </div>
			        </div> 


<script src="js/pop_up.js"></script> 