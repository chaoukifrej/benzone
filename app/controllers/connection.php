<?php

/**
 * controllers/connection.php - Controller connexion
 */

/* Namespace */

namespace App\Controllers;



class Connection
{

    public function userConnection()
    {
        var_dump($_POST);
        if (isset($_POST['formConnection'])) {
            include_once  __DIR__ . "/../core/database.php";
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
                    header('Location: home.php?id=' . $_SESSION['id']);
                } else {
                    $error = "Utilisateurs non trouvé";
                }
            }



            //. Connexion Base de données



            //. CONNEXION UTILISATEURS
            if (isset($error)) {
                echo $error;
            }
        }
    }
}

//. array
//. rowcount