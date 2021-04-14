<?php


/**
 * controllers/home.php - Controleur accueil pour la page d'accueil
 */

/* Namespace */

namespace App\Controllers;


use App\Controllers\Component\Menu;


class Perso
{


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

                <form class="modif" action="perso" method="POST">
                    <h1>modifier votre profil</h1>
                    <label for="">modifier votre Nom</label>
                    <input name="lastname" type="text">
                    <label for="">modifier votre Prenom</label>
                    <input name="firstname" type="text">
                    <label for="">modifier votre Email</label>
                    <input name="email" type="text">
                    <label for="">modifier votre Mot de passe</label>
                    <input name="password" type="password">
                    <label for="">confirmer votre nouveau mot de passe</label>
                    <input type="password">
                    <input class="button" value="Modifier" name="send" type="submit">
                </form>

                <div class="persoInfo">

                    </form>
                    <h3>Prenom : <?php echo $_SESSION['firstname'] ?></h3>
                    <h3>Nom : <?php echo $_SESSION['lastname'] ?></h3>
                    <h3>E-mail : <?php echo $_SESSION['email'] ?></h3>
                    <form action="perso" method="POST">
                        <input type="hidden" value="0" name="is_connected">
                        <input type="submit" value="deconnexion">

                </div>




            </div>
        </body>

        </html>
<?php
    }
}
