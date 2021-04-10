<?php

/**
 * controllers/addAnnonce.php - Controleur pour ajouter une annonce
 */

/* Namespace */

namespace App\Controllers;

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

      <link rel="stylesheet"  href="assets/styles/addAnnonce.css" />
    </head>

    <body>

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
