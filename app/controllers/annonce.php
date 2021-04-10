<?php

/**
 * controllers/advertInfo.php - Controleur pour la page Annonce
 */

/* Namespace */

namespace App\Controllers;

class Annonce
{

  /**
   * Affichage de la page annonce
   */
  public function render()
  {
?>
    <!DOCTYPE html>
    <html>

    <head>
      <meta charset="utf-8">
      <title>Annonce</title>

      <link rel="stylesheet" type="text/css" href="assets/styles/style.css" />
    </head>

    <body>
      <div id="mainContainer">
        <h1>Annonce</h1>
        <p>Bienvenue sur la page annonce de merde</p>
      </div>
    </body>

    </html>
<?php
  }
}
