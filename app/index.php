<?php

/**
 * index.php - Point d'entrée de l'application
 * C'est ici que l'on défini les routes 
 * et les fonctions des controleurs qui dervont être appelées
 */

/* Imports */
require_once __DIR__ . "/core/Router.class.php"; // Routeur
include_once __DIR__ . "/controllers/home.php";
include_once __DIR__ . "/controllers/default.php";
include_once __DIR__ . "/View/advertInfo.php";


use App\Router\Router;
use App\Controllers\Home;
use App\Controllers\DefaultPage;


/**
 * Requête
 */
$method = $_SERVER['REQUEST_METHOD']; // Récupération du verbe
$uri = $_GET['uri']; // Récupération de l'URI


/**
 * Router
 */

/* Création du routeur */
$router = new Router($uri, $method);


/**
 * Routes
 */

/* GET / - Page d'accueil */
$router->get("/",  [new Home(), 'render']);

/* Route par défaut */
$router->default([new DefaultPage(), 'render']);



/**
 * Recherche de routes correspondantes
 */

/* Démarrage du routeur */
$router->start();
