<?php

/**
 * controllers/home.php - Controleur accueil pour la page d'accueil
 */

/* Namespace */

namespace App\Controllers;

use App\Controllers\Component\Menu;

class Home
{

    /**
     * Affichage de la page d'accueil
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
            <?php include_once __DIR__ . "/Component/header.php";
            new Menu('ACCUEIL');
            ?>
            <div id="mainContainer">
                <h1>Démo routeur</h1>
                <p>Bienvenue</p>
            </div>
            <?php include_once __DIR__ . "/Component/footer.php";
            ?>
        </body>

        </html>
<?php
    }
}
