<?php

/**
 * controllers/login.php - Controleur accueil pour la page de connexion
 */

/* Namespace */

namespace App\Controllers;

include __DIR__ . '/../views/login.view.php';
include __DIR__ . "/../models/Users.model.php";


use App\Views\Login as LoginView;
use App\Models\Users;

class Login
{
    /**
     * Affichage de la page de connexion
     */
    public function render()
    {
        $Users = new Users();
        $Users->registration();
        $Users->connection();
        $userView = new LoginView;
        $userView->render();
    }
}
