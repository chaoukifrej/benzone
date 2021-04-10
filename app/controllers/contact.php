<?php

/**
 * controllers/contact.php - Controleur Contact pour la page contact
 */

/* Namespace */

namespace App\Controllers;

class Contact
{

  /**
   * Affichage de la page contact
   */
  public function render()
  {
?>
    <!DOCTYPE html>
    <html>

    <head>
      <meta charset="utf-8">
      <title>Contact</title>

      <link rel="stylesheet" type="text/css" href="assets/styles/style.css" />
    </head>

    <body>
      <div id="mainContainer">
        <h1>Contact</h1>
        <p>Bienvenue sur la page contact de merde</p>
      </div>
    </body>

    </html>
<?php
  }
}
