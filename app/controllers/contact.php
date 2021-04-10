<?php

/**
 * controllers/contact.php - Controleur Contact pour la page contact
 */

/* Namespace */

namespace App\Controllers;

use App\Controllers\Component\Menu;

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

      <link rel="stylesheet" type="text/css" href="./assets/styles/contact.css" />
    </head>

    <body>
      <?php include_once __DIR__ . "/Component/header.php";
      new Menu('CONTACT');
      ?>
      <div id="mainContainer">
        <h1>Contact</h1>
        <p>Bienvenue sur la page contact de merde</p>
      </div>
    </body>

    </html>
<?php
  }
}
