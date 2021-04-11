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
      a.start_date,
      a.final_date,
      a.description,
      a.picture,
      a.owner_id,
      a.bidder_id,
      c.id,
      c.brand,
      c.model,
      c.power,
      c.vehicle_year,
      c.vehicle_km,
      u.lastname as ownerln,
      u.firstname as ownerfn,
      b.lastname as bidderln,
      b.firstname as bidderfn
  FROM
      adverts a
  INNER JOIN 
      car c
  ON c.id = a.car_id
  INNER JOIN
      users u
  ON a.owner_id = u.id
  INNER JOIN
      users b
  ON a.bidder_id = b.id
  WHERE a.id = $_GET[id]
  ")->fetchAll(\PDO::FETCH_ASSOC);
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
        <a class="btnRetour" href="accueil"> <img src="assets/img/arrow.svg" alt=""> Retour</a>
        <?php
        $this->databaseGetAdverts();
        var_dump($this->advert);
        ?>
      </div>
    </body>

    </html>

<?php
  }
}
