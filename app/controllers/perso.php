<?php

/**
 * controllers/home.php - Controleur accueil pour la page d'accueil
 */

/* Namespace */

namespace App\Controllers;

use App\Controllers\Component\Menu;



class Perso
{
    public function render()
    {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>

        <body>
            <?php include_once __DIR__ . "/Component/header.php";
            new Menu('ENCHÈRES');
            ?>
            <form action="">
                <h1>modifier votre profil</h1>
                <label for="">modifier votre Nom</label>
                <input name="lastname" type="text">
                <label for="">modifier votre Prenom</label>
                <input name="firstname" type="text">
                <label for="">modifier votre Email</label>
                <input name="mail" type="text">
                <label for="">modifier votre Mot de passe</label>
                <input name="password" type="password">
                <label for="">confirmer votre nouveau mot de passe</label>
                <input type="password">
            </form>



        </body>

        </html>
<?php
    }
}
