<?php

/**
 * controllers/login.php - Controleur accueil pour la page de connexion
 */

/* Namespace */

namespace App\Controllers;

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
            <div id="mainContainer">
                <h1 id="title">Page connexion</h1>
                <form id="formConnectionInscription" action="" method="">
                    <div id="connection">
                        <label for="">Email</label>
                        <input type="text" name="">

                        <label for="">Mot de passe</label>
                        <input type="password" name="">
                    </div>

                    <div id="inscription">
                        <label for="">Nom</label>
                        <input type="text" name="">

                        <label for="">Prénom</label>
                        <input type="text" name="">

                        <label for="">Email</label>
                        <input type="text" name="">

                        <label for="">Mot de passe</label>
                        <input type="password" name="">
                    </div>

                    <input type="submit">

                    <p>Pas de compte ? <button id="btnConnectionToInscription">inscrivez-vous</button> !</p>
                </form>
            </div>
            <script type="text/javascript" src="./assets/js/login.js"></script>
        </body>

        </html>
<?php
    }
}
