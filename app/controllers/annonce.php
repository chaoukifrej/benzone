<?php

namespace App\Controllers;

use Menu;

class Annonce
{
  //Affichage de la page annonce
  public function render()
  {
?>
    <!DOCTYPE html>
    <html>

    <head>
      <meta charset="utf-8">
      <title>Annonce</title>
      <link rel="stylesheet" href="assets/styles/style.css" />
      <link rel="stylesheet" href="assets/styles/annonce.css" />
    </head>

    <body>
      <?php include_once __DIR__ . "/Component/header.php";
      new Menu();
      ?>
      <div id="mainContainer">
        <h1>Annonce</h1>
        <p>Bienvenue sur la page annonce de merde</p>
      </div>
    </body>

    </html>

<?php
  }
}
