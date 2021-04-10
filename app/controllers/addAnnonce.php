<?php

/**
 * controllers/addAnnonce.php - Controleur pour ajouter une annonce
 */

/* Namespace */

namespace App\Controllers;

use App\Controllers\Component\Menu;

class AddAnnonce
{

  /**
   * Affichage de la création annonce
   */
  public function render()
  {
?>
    <!DOCTYPE html>
    <html>

    <head>
      <meta charset="utf-8">
      <title>AddAnnonce</title>

      <link rel="stylesheet" href="./assets/styles/addannonce.css" />
      <link rel="stylesheet" href="assets/styles/addAnnonce.css" />
    </head>

    <body>
      <?php include_once __DIR__ . "/Component/header.php";
      new Menu('VENDRE');
      ?>
      <h1>AJOUTER UNE ANNONCE</h1>

      <form action="">

        <label for="">Modèle</label><br>
        <input type="text"><br><br>

        <label for="">Marque</label><br>
        <select name="" id="">
          <option value="">Abarth</option>
        </select>

      </form>


    </body>

    </html>

<?php
  }
}
