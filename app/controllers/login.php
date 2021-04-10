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

            <link rel="stylesheet" type="text/css" href="assets/styles/style.css" />
        </head>

        <body>
            <div id="mainContainer">
                <h1>Page connexion</h1>
                <p>Bienvenue</p>
            </div>
        </body>

        </html>
<?php
    }
}
