<?php

/**
 * controllers/home.php - Controleur accueil pour la page d'accueil
 */

/* Namespace */

namespace App\Controllers;

use App\Controllers\Component\Menu;
use App\Controllers\Component\AnnonceCard;



class Home
{
    protected $adverts;

    public function databaseGetAdverts()
    {
        //. Connexion Base de données
        include  __DIR__ . "/../core/database.php";
        $this->adverts = $dbh->query("SELECT
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
            <?php include_once __DIR__ . "/Component/header.php";
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
                <?php
                $this->databaseGetAdverts();
                ?>
                <h1>Enchères (<?= count($this->adverts) ?>)</h1>
                <div class="cards">
                    <?php include_once __DIR__ . "/Component/annonceCard.php";
                    foreach ($this->adverts as $value) {
                        new AnnonceCard($value);
                    }
                    ?>
                </div>
            </div>
            <?php include_once __DIR__ . "/Component/footer.php";
            ?>
        </body>

        </html>
<?php
    }
}
