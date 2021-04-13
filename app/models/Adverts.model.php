<?php

/* Namespace */

namespace App\Models;


class Adverts
{
  protected $adverts;

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

  //Get the value of adverts
  public function getAdverts()
  {
    return $this->adverts;
  }
}
