<?php

namespace App\Controllers;

use App\Controllers\Component\Menu;


class Annonce
{
  protected $advert;

  public function databaseGetAdverts()
  {
    //. Connexion Base de données
    include  __DIR__ . "/../core/database.php";
    $this->advert = $dbh->query("SELECT
      a.id,
      a.actual_price,
      a.final_date,
      a.description,
      a.picture,
      c.brand,
      c.model
  FROM
      adverts a
  INNER JOIN 
      car c
  ON c.id = a.car_id")->fetchAll(\PDO::FETCH_ASSOC);
  }

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
        <?php
        $this->databaseGetAdverts();
        var_dump($this->advert);
        var_dump($_GET);
        ?>
      </div>
    </body>

    </html>

<?php
  }
}
