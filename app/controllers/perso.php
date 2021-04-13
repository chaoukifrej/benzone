<?php


/**
 * controllers/home.php - Controleur accueil pour la page d'accueil
 */

/* Namespace */

namespace App\Controllers;


use App\Controllers\Component\Menu;


class Perso
{

    protected $advert;

    public function countTotal()
    {
        $stock = 0;
        foreach ($this->advert as $key => $value) {
            foreach ($value as $k => $v) {
                if ($k == "actual_price") {
                    $stock += (int)$v;
                }
            }
        }

        return $stock;
    }

    public function winAdvert()
    {
        //. Connexion Base de données
        include  __DIR__ . "/../core/database.php";

        $this->advert = $dbh->query("SELECT c.model , c.brand, a.actual_price , a.id FROM adverts a INNER JOIN car c ON c.id = a.car_id WHERE a.bidder_id = $_SESSION[id]")->fetchAll(\PDO::FETCH_ASSOC);
    }
    // SELECT  a.id, a.actual_price, a.final_date, a.description, c.model, c.brand, c.power FROM adverts a INNER JOIN car c ON c.id = a.car_id WHERE a.bidder_id = 39

    /* fonction modification base de données */

    public function updatePerso()
    {
        //connexion data base 
        include  __DIR__ . "/../core/database.php";

        $lastname = filter_var($_POST["lastname"], FILTER_SANITIZE_STRING);
        $firstname = filter_var($_POST["firstname"], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);


        $query = $dbh->prepare("UPDATE users SET `lastname`= ?, `firstname`= ?, `email`= ?, `password`= ? WHERE id = ?");
        $result = $query->execute([$lastname, $firstname, $email, $password, 1]);
    }



    //fonction affichage annonce remporté par l'utilsateur



    /* fonction deconexion  */
    public function disconnection()
    {
        include  __DIR__ . "/../core/database.php";

        // passage isConnected a 0
        $userRequest = $dbh->prepare('UPDATE users SET is_connected = ? WHERE id = ?');
        $userRequest->execute([0, $_SESSION['id']]);

        session_destroy();
        header('Location: accueil');
    }

    /* fonction rendu visuel */
    public function render()
    {
?>


        <!-- affichage Modif Profil -->

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="./assets/style.css">
            <link rel="stylesheet" type="text/css" href="assets/styles/card.css">
            <link rel="stylesheet" href="./assets/styles/perso.css">
            <title>Document</title>
        </head>

        <body>

            <?php include_once __DIR__ . "/Component/header.php";
            new Menu();

            ?>
            <div class="mainContainer">
                <div class="profil">
                    <?php
                    $this->winAdvert();
                    ?>
                    <form class="modif" action="perso" method="POST">
                        <h1>modifier votre profil</h1>
                        <label for="">modifier votre Nom</label>
                        <input name="lastname" type="text" value="<?= $_SESSION['lastname'] ?>">
                        <label for="">modifier votre Prenom</label>
                        <input name="firstname" type="text" value="<?= $_SESSION['firstname'] ?>">
                        <label for="">modifier votre Email</label>
                        <input name="email" type="text" value="<?= $_SESSION['email'] ?>">
                        <label for="">modifier votre Mot de passe</label>
                        <input name="password" type="password" value="<?= $_SESSION['password'] ?>">
                        <label for="">confirmer votre nouveau mot de passe</label>
                        <input type="password" value="<?= $_SESSION['password'] ?>">
                        <input class="button" value="Modifier" name="send" type="submit">
                    </form>

                    <div class="persoInfo">

                        <h3>Prenom : <?php echo $_SESSION['firstname'] ?></h3>
                        <h3>Nom : <?php echo $_SESSION['lastname'] ?></h3>
                        <h3>E-mail : <?php echo $_SESSION['email'] ?></h3>
                        <form action="perso" method="POST">
                            <input type="hidden" value="0" name="is_connected">
                            <input type="submit" value="deconnexion">
                        </form>
                    </div>
                </div>
                <h3>Encheres en cours (<?= $this->countTotal() . " €"; ?>)</h3>

                <?php

                foreach ($this->advert as $value) { ?>
                    <form action="annonce" method="GET">
                        <button type="submit">
                            <?php echo $value['brand'] . ' ' . $value['model'] . ' ' . $value['actual_price'] . '€<br />'; ?>
                            <input type="hidden" name="id" value="<?= $value['id']; ?>">
                        </button>
                    </form>

                <?php  } ?>




            </div>
        </body>

        </html>
<?php
    }
}
