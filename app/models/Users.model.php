<?php

/* Namespace */

namespace App\Models;


class Users
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
                            include  __DIR__ . "/../core/database.php";


                            //. INSCRIPTION UTILISATEURS
                            if ($data_validated === true) {
                                $query = $dbh->prepare('INSERT INTO users(lastname, firstname, email, password) VALUES (?, ?, ?, ?)');
                                $result = $query->execute([ucfirst($lastname), ucfirst($firstname), $email, $password]);
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

        include  __DIR__ . "/../core/database.php";

        if (isset($_POST['formConnection'])) {


            $mailConnect = filter_var($_POST['mailConnect'], FILTER_SANITIZE_STRING);
            $passwordConnect = filter_var($_POST['passwordConnect'], FILTER_SANITIZE_STRING);

            if (!empty($mailConnect) && !empty($passwordConnect)) {
                $userRequest = $dbh->prepare('SELECT * FROM users WHERE email = ? AND password = ?');
                $userRequest->execute(array($mailConnect, $passwordConnect));
                $userExist = $userRequest->rowCount();


                if ($userExist == 1) {
                    $userInfo = $userRequest->fetch();
                    $id = $_SESSION['id'] = $userInfo['id'];
                    $_SESSION['lastname'] = $userInfo['lastname'];
                    $_SESSION['firstname'] = $userInfo['firstname'];
                    $_SESSION['email'] = $userInfo['email'];
                    $_SESSION['password'] = $userInfo['password'];
                    $_SESSION['is_connected'] = 1;
                    $error = "Connection réussi";

                    // passage isConnected a 1
                    $userRequest = $dbh->prepare('UPDATE users SET is_connected = ? WHERE id = ?');
                    $userRequest->execute([1, $id]);

                    header('Location: accueil?id=' . $id);
                } else {
                    $error = "Utilisateurs non trouvé";
                    header('Location: login');
                }
            }

            //. CONNEXION UTILISATEURS
            if (isset($error)) {
                echo $error;
            }
        }
    }
    public function updatePerso()
    {
        //connexion data base 
        include  __DIR__ . "/../core/database.php";

        $lastname = filter_var($_POST["lastname"], FILTER_SANITIZE_STRING);
        $firstname = filter_var($_POST["firstname"], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);


        $query = $dbh->prepare(" UPDATE users SET lastname = ?, firstname = ?, email = ?, password = ? WHERE id = ? ");
        $query->execute([$lastname, $firstname, $email, $password, $_SESSION['id']]);
        header('location: accueil');
    }



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
}
