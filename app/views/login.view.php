<?php

/* Namespace */

namespace App\Views;



use App\Controllers\Component\Menu;


class Login
{

    /**
     * Affichage de la page de connexion
     */
    public function render()
    { ?>
        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="utf-8">
            <title>Démo routeur V1</title>

            <link rel="stylesheet" href="./assets/styles/style.css" />
            <link rel="stylesheet" href="./assets/styles/login.css" />
        </head>

        <body>
            <?php
            new Menu('login');
            ?>
            <div class="mainContainer">
                <div id="connection">

                    <h2>CONNEXION</h2>
                    <?php
                    if (!isset($_SESSION['id'])) { ?>
                        <!-- <span>Email ou mot de passe incorrect</span> -->
                    <?php } ?>
                    <form id="formConnection" action="login" method="POST">

                        <label class="conLabel" for="">Email</label>
                        <input class="loginInput" type="text" name="mailConnect" required>

                        <label class="conLabel" for="">Mot de passe</label>
                        <input class="loginInput" type="password" name="passwordConnect" required>

                        <input class="submitInput conSubmit" name="formConnection" type="submit">

                    </form>
                    <p>Pas de compte ? <button id="btnConnectionToRegistration">inscrivez-vous</button> !</p>


                </div>

                <div id="registration">

                    <h2>INSCRIPTION</h2>

                    <form id="formRegistration" action="login" method="POST">

                        <label class="inscLabel" for="lastname">Nom</label>
                        <input class="loginInput" type="text" name="lastname" required>

                        <label class="inscLabel" for="firstname">Prénom</label>
                        <input class="loginInput" type="text" name="firstname" required>

                        <label class="inscLabel" for="email">Email</label>
                        <input class="loginInput" type="mail" name="email" required>

                        <label class="inscLabel" for="password">Mot de passe</label>
                        <input class="loginInput" type="password" name="password" required>

                        <input class="submitInput" name="formRegistration" type="submit">
                    </form>
                    <p>Déja inscrit ? <button id="btnRegistrationToConnection">connectez-vous</button> !</p>
                </div>
            </div>




            </div>
            <script type="text/javascript" src="./assets/js/login.js"></script>
        </body>

        </html>
<?php
    }
}
