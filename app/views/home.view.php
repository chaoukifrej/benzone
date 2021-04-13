<?php

/* Namespace */

namespace App\Views;

include __DIR__ . "/../controllers/Component/header.php";
include __DIR__ . "/../controllers/Component/annonceCard.php";

use App\Controllers\Component\Menu;
use App\Controllers\Component\AnnonceCard;




class Home
{
  protected $adverts;


  public function __construct($adverts)
  {
    $this->adverts = $adverts;
  }
  //Affichage de la page d'accueil
  public function render()
  {

?>
    <!DOCTYPE html>
    <html>

    <head>
      <meta charset="utf-8">
      <title>Démo routeur V1</title>
      <link rel="shortcut icon" type="image/ico" href="favicon.ico" />
      <link rel="stylesheet" type="text/css" href="assets/styles/style.css" />
      <link rel="stylesheet" type="text/css" href="assets/styles/home.css">
      <link rel="stylesheet" type="text/css" href="assets/styles/card.css">
    </head>

    <body>
      <?php
      new Menu('ENCHÈRES');

      ?>
      <div class="hero">
        <div class="heroImg">
          <h2>
            Vente aux enchères
          </h2>
          <p>
            Benzin c'est bien, Benzone c'est mieux
          </p>
        </div>
      </div>
      <div id="mainContainer">
        <h1>Enchères (<?= count($this->adverts) ?>)</h1>
        <div class="cards">
          <?php
          foreach ($this->adverts as $value) {
            new AnnonceCard($value);
          }
          ?>
        </div>
      </div>
      <?php include __DIR__ . "/../controllers/Component/footer.php";
      ?>
    </body>

    </html>
<?php
  }
}
