<?php

/**
 * controllers/login.php - Controleur accueil pour la page de connexion
 */

/* Namespace */

namespace App\Controllers;

use App\Controllers\Component\Menu;

class Login
{

    /**
     * Affichage de la page de connexion
     */
    public function render()
    {
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

                <div id="leftLogin">


                    <div id="connection">
                        <form id="formConnection" action="" method="">

                            <label for="">Email</label>
                            <input class="loginInput" type="text" name="">

                            <label for="">Mot de passe</label>
                            <input class="loginInput" type="password" name="">

                            <input type="submit">

                        </form>
                        <p>Pas de compte ? <button id="btnConnectionToInscription">inscrivez-vous</button> !</p>
                    </div>

                    <div id="inscription">
                        <form id="formInscription" action="">
                            <label for="">Nom</label>
                            <input class="loginInput" type="text" name="">

                            <label for="">Prénom</label>
                            <input class="loginInput" type="text" name="">

                            <label for="">Email</label>
                            <input class="loginInput" type="text" name="">

                            <label for="">Mot de passe</label>
                            <input class="loginInput" type="password" name="">

                            <input type="submit">
                        </form>
                        <p>Déja inscrit ? <button id="btnInscriptionToConnection">connectez-vous</button> !</p>
                    </div>

                </div>



            </div>
            <script type="text/javascript" src="./assets/js/login.js"></script>
        </body>

        </html>
<?php
    }
}
