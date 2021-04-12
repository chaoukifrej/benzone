<?php

/**
 * controllers/login.php - Controleur accueil pour la page de connexion
 */

/* Namespace */

namespace App\Controllers;

use App\Controllers\Component\Menu;


class Login
{
    /**
     *. fonction inscription verif
     */
    public function registration()
    {
        //. INSCRIPTION
        if (isset($_POST['formRegistration'])) {
            //. NETTOYAGE 
            $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
            $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

            $lastnameLenght = strlen($lastname);
            $firstnameLenght = strlen($firstname);
            $emailLenght = strlen($email);
            $passwordLenght = strlen($password);

            $data_validated = true;

            if ($lastnameLenght < 64) {
                if ($firstnameLenght < 64) {
                    if ($emailLenght < 64) {
                        if ($passwordLenght < 64) {
                            //. VERIFICATION
                            if (filter_var($_POST["lastname"], FILTER_SANITIZE_STRING) === false) {
                                $data_validated = false;
                            } elseif (filter_var($_POST["firstname"], FILTER_SANITIZE_STRING) === false) {
                                $data_validated = false;
                            } elseif (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
                                $data_validated = false;
                            } elseif (filter_var($_POST["password"], FILTER_SANITIZE_STRING) === false) {
                                $data_validated = false;
                            }

                            //. Connexion Base de données
                            include_once  __DIR__ . "/../core/database.php";


                            //. INSCRIPTION UTILISATEURS
                            if ($data_validated === true) {
                                $query = $dbh->prepare('INSERT INTO users(lastname, firstname, email, password) VALUES (?, ?, ?, ?)');
                                $result = $query->execute([ucfirst($lastname), $firstname, $email, $password]);
                                header('location: login');
                            }
                        } else {
                            $erreur = "Mot de passe trop long";
                        }
                    } else {
                        $erreur = "Email trop long";
                    }
                } else {
                    $erreur = "Prénom trop long";
                }
            } else {
                $erreur = "Nom de famille trop long";
            }
            if (isset($erreur)) {
                echo $erreur;
            }
            header('location: login');
        }
    }


    /**
     * .fonction inscription verif
     */
    public function connection()
    {

        include_once  __DIR__ . "/../core/database.php";
        if (isset($_POST['formConnection'])) {


            session_start();

            if (isset($_POST['mailConnect']) && isset($_POST['passwordConnect'])) {
                $mailConnect = filter_var($_POST['mailConnect'], FILTER_SANITIZE_STRING);
                $passwordConnect = filter_var($_POST['passwordConnect'], FILTER_SANITIZE_STRING);
            }


            if (!empty($mailConnect) && !empty($passwordConnect)) {
                $userRequest = $dbh->prepare('SELECT * FROM users WHERE email = ? AND password = ?');
                $userRequest->execute(array($mailConnect, $passwordConnect));
                $userExist = $userRequest->rowCount();


                if ($userExist == 1) {
                    $userInfo = $userRequest->fetch();
                    $_SESSION['id'] = $userInfo['id'];
                    $_SESSION['lastname'] = $userInfo['lastname'];
                    $_SESSION['firstname'] = $userInfo['firstname'];
                    $_SESSION['email'] = $userInfo['email'];
                    $_SESSION['password'] = $userInfo['password'];
                    header('Location: accueil?id=' . $_SESSION['id']);
                } else {
                    $error = "Utilisateurs non trouvé";
                }
            }

            //. CONNEXION UTILISATEURS
            if (isset($error)) {
                echo $error;
            }
        }
    }


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
            <?php include_once __DIR__ . "/Component/header.php";
            new Menu('login');
            ?>
            <div class="mainContainer">
                <div id="connection">

                    <h2>CONNEXION</h2>
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
