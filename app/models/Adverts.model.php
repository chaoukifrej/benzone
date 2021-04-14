<?php

/* Namespace */

namespace App\Models;


class Adverts
{
  protected $adverts;
  protected $advert;
  protected $bidder;

  public function databaseGetAdverts()
  {
    //. Connexion Base de données
    include  __DIR__ . "/../core/database.php";
    //Selection des entrée dans table adverts
    $this->adverts = $dbh->query("SELECT
        a.id,
        a.actual_price,
        a.final_date,
        a.description,
        a.picture,
        c.brand,
        c.model,
        c.vehicle_year
    FROM
        adverts a
    INNER JOIN 
        car c
    ON c.id = a.car_id")->fetchAll(\PDO::FETCH_ASSOC);
  }

  public function databaseGetAdvert()
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
      c.id as car_id,
      c.brand,
      c.model,
      c.power,
      c.vehicle_year,
      c.vehicle_km,
      u.lastname as ownerln,
      u.firstname as ownerfn
  FROM
      adverts a
  INNER JOIN 
      car c
  ON c.id = a.car_id
  INNER JOIN
      users u
  ON a.owner_id = u.id
  WHERE a.id = $_GET[id]
  ")->fetchAll(\PDO::FETCH_ASSOC);
    $this->advert = $this->advert[0];

    if (!is_null($this->advert['bidder_id'])) {
      $this->bidder = $dbh->query("SELECT
      b.lastname as bidderln,
      b.firstname as bidderfn
      FROM
      users b
      WHERE b.id = {$this->advert['bidder_id']}
    ")->fetchAll(\PDO::FETCH_ASSOC);
      $this->bidder = $this->bidder[0];
    } else {
      $this->bidder = [
        'lastname' => 'Aucun',
        'firstname' => 'gagnant'
      ];
    };
    //$this->advert['bidder_id'] ?? $this->advert['bidder_id'] = 1;
  }

  public function databaseSetActualPrice()
  {
    //. Connexion Base de données
    include  __DIR__ . "/../core/database.php";

    //nettoyage et validation
    $price = $_POST["new_price"];
    $price = filter_var($price, FILTER_SANITIZE_NUMBER_INT);
    $price = filter_var($price, FILTER_VALIDATE_INT);

    if ($price > $_POST['actual_price']) {
      $query = $dbh->prepare('UPDATE
      `adverts`
      SET
      `actual_price` = ?,
      `bidder_id` = ?
      WHERE
      id = ?');
      $query->execute([$price, $_SESSION['id'], $_POST['id']]);
      header('location: annonce?id=' . $_POST["id"]);
    } else {
      header('location: annonce?id=' . $_POST["id"]);
    }
  }

  //Post add Car / Adverts
  public function addCar()
  {
    //! Connexion Base de données
    include  __DIR__ . "/../core/database.php";

    //. Déclaration données
    $brand = filter_var(strtoupper($_POST["brand"]), FILTER_SANITIZE_STRING);
    $model = filter_var(ucfirst($_POST["model"]), FILTER_SANITIZE_STRING);
    $power = filter_var($_POST["power"], FILTER_SANITIZE_NUMBER_INT);
    $km = filter_var($_POST["km"], FILTER_SANITIZE_NUMBER_INT);
    $vehicleYear = filter_var($_POST["vehicleYear"], FILTER_SANITIZE_STRING);

    //? Préparation de la requête
    $query = $dbh->prepare("INSERT INTO car (model, brand ,power , vehicle_year, vehicle_km) VALUES (?,?,?,?,?)");

    //? Execution de la requête 
    $result = $query->execute([$model, $brand, $power, $vehicleYear, $km]);

    if ($result === true) {
      $car_id = $dbh->lastInsertId();
      $this->addAdverts($car_id);
    }
  }


  // FONCTION AJOUTER UNE ANNONCE
  private function addAdverts($car_id)
  {
    include  __DIR__ . "/../core/database.php";

    $firstPrice = filter_var($_POST["firstPrice"]);
    $actualPrice = filter_var($firstPrice, FILTER_SANITIZE_NUMBER_FLOAT);
    $finalDate = filter_var($_POST["finalDate"], FILTER_SANITIZE_STRING);
    $descriptionAnnonce = filter_var($_POST["descriptionAnnonce"], FILTER_SANITIZE_STRING);
    $picture = filter_var($_POST["picture"], FILTER_SANITIZE_URL);
    $startDate = filter_var(date("Y-m-d"), FILTER_SANITIZE_STRING);
    $user_id = filter_var($_SESSION['id'], FILTER_SANITIZE_NUMBER_INT);
    $user_car = filter_var(intval($car_id), FILTER_SANITIZE_NUMBER_INT);

    //? Préparation de la requête
    $query = $dbh->prepare("INSERT INTO adverts (first_price,actual_Price,start_date, final_date, description, picture,owner_id,car_id) VALUES (?,?,?,?,?,?,?,?)");

    //? Execution de la requête 
    $result = $query->execute([$firstPrice, $actualPrice, $startDate, $finalDate, $descriptionAnnonce, $picture, $user_id, $user_car]);

    header('location: accueil');
  }

  //Get the value of adverts
  public function getAdverts()
  {
    return $this->adverts;
  }

  //Get the value of advert
  public function getAdvert()
  {
    return $this->advert;
  }

  //Get the value of bidder
  public function getBidder()
  {
    return $this->bidder;
  }
}
