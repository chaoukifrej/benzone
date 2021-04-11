<?php

/**
 * controllers/login.php - Controleur accueil pour la page de connexion
 */

/* Namespace */

namespace App\Controllers;

use App\Controllers\Component\Menu;
use PDO;

class Login
{

    /**
     * Affichage de la page de connexion
     */
    public function render()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //. NETTOYAGE 
            $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
            $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

            $data_validated = true;

            //. VERIFICATION
            if (filter_var($_POST["lastname"], FILTER_SANITIZE_STRING) === false) {
                $data_validated = false;
            } elseif (filter_var($_POST["firstname"], FILTER_SANITIZE_STRING) === false) {
                $data_validated = false;
            } elseif (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
                $data_validated = false;
            } elseif (filter_var($_POST["password"], FILTER_SANITIZE_STRING) === false) {
                $data_validated = false;
            }


            //. Connexion Base de données
            include_once  __DIR__ . "/../core/database.php";


            //. INSCRIPTION UTILISATEURS
            if ($data_validated === true) {
                $query = $dbh->prepare('INSERT INTO users(lastname, firstname, email, password) VALUES (?, ?, ?, ?)');
                $result = $query->execute([ucfirst($lastname), $firstname, $email, $password]);
            }
        }

?>
        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="utf-8">
            <title>Démo routeur V1</title>

            <link rel="stylesheet" href="./assets/styles/style.css" />
            <link rel="stylesheet" href="./assets/styles/login.css" />
        </head>

        <body>
            <?php include_once __DIR__ . "/Component/header.php";
            new Menu('login');
            ?>
            <div id="mainContainer">
                <div id="background">
                    <div id="heroBackground">
                        <div id="connection">

                            <h2>CONNEXION</h2>
                            <form id="formConnection" action="" method="POST">

                                <label class="conLabel" for="">Email</label>
                                <input class="loginInput" type="text" name="">

                                <label class="conLabel" for="">Mot de passe</label>
                                <input class="loginInput" type="password" name="">

                                <input class="submitInput conSubmit" type="submit">

                            </form>
                            <p>Pas de compte ? <button id="btnConnectionToInscription">inscrivez-vous</button> !</p>
                        </div>

                        <div id="inscription">

                            <h2>INSCRIPTION</h2>
                            <form id="formInscription" action="login" method="POST">

                                <label for="lastname">Nom</label>
                                <input class="loginInput" type="text" name="lastname">

                                <label class="inscLabel" for="firstname">Prénom</label>
                                <input class="loginInput" type="text" name="firstname">

                                <label class="inscLabel" for="email">Email</label>
                                <input class="loginInput" type="mail" name="email">

                                <label class="inscLabel" for="password">Mot de passe</label>
                                <input class="loginInput" type="password" name="password">

                                <input class="submitInput" type="submit">
                            </form>
                            <p>Déja inscrit ? <button id="btnInscriptionToConnection">connectez-vous</button> !</p>
                        </div>
                    </div>
                </div>



            </div>



            </div>
            <script type="text/javascript" src="./assets/js/login.js"></script>
        </body>

        </html>
<?php
    }
}
