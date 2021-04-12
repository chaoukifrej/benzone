<?php


/**
 * controllers/home.php - Controleur accueil pour la page d'accueil
 */

/* Namespace */

namespace App\Controllers;


use App\Controllers\Component\Menu;



class Perso
{

    public function updatePerso()
    {

        include  __DIR__ . "/../core/database.php";

        $lastname = filter_var($_POST["lastname"], FILTER_SANITIZE_STRING);
        $firstname = filter_var($_POST["firstname"], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);


        $query = $dbh->prepare("UPDATE users SET `lastname`= ?, `firstname`= ?, `email`= ?, `password`= ? WHERE id = ?");
        $result = $query->execute([$lastname, $firstname, $email, $password, $_SESSION['id']]);
    }

    public function disconnection()
    {
        include  __DIR__ . "/../core/database.php";

        // passage isConnected a 0
        $userRequest = $dbh->prepare('UPDATE users SET is_connected = ? WHERE id = ?');
        $userRequest->execute([0, $_SESSION['id']]);

        session_destroy();
        header('Location: accueil');
    }


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
            <link rel="stylesheet" href="./assets/styles/perso.css">
            <title>Document</title>
        </head>

        <body>
            <?php include_once __DIR__ . "/Component/header.php";
            new Menu('ENCHÈRES');
            ?>
            <form action="perso" method="POST">
                <input type="hidden" value="0" name="is_connected">
                <input type="submit" value="deconnexion">
            </form>
            <form action="perso" method="POST">
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
                <input class="button" name="send" type="submit">
            </form>

            <div>
                <h1>Prenom :</h1> <?php echo $_SESSION['firstname'] ?>
                <h1>Nom :</h1> <?php echo $_SESSION['lastname'] ?>
                <h1>E-mail :</h1> <?php echo $_SESSION['email'] ?>
            </div>

        </body>

        </html>
<?php
    }
}
