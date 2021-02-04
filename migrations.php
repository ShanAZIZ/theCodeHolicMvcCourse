<?php

//on appelle les classes 
use app\core\Application;
use app\controllers\SiteController;
use app\controllers\AuthController;

// L'application utilise autoload installer par composer pour les namespaces
require_once __DIR__.'/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];

//On crée une instance de la classe core/Application 
$app = new Application(__DIR__, $config);


//On lance la methode run de l'application
$app->db->applyMigrations();

