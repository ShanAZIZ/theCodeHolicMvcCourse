<?php

//on appelle les classes 
use app\core\Application;
use app\controllers\SiteController;
use app\controllers\AuthController;

// L'application utilise autoload installer par composer pour les namespaces
require_once __DIR__.'/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();


$config = [
    'userClass' => \app\models\User::class,
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];

//On crée une instance de la classe core/Application 
$app = new Application(dirname(__DIR__), $config);

//Ajout de chaque URL, la methode et le controller correspondant dans la liste router
$app->router->get( '/', [SiteController::class, 'home']);

$app->router->get( '/contact', [SiteController::class, 'contact']);
$app->router->post( '/contact', [SiteController::class, 'contact']);

$app->router->get( '/login', [AuthController::class, 'login']);
$app->router->post( '/login', [AuthController::class, 'login']);

$app->router->get( '/register', [AuthController::class, 'register']);
$app->router->post( '/register', [AuthController::class, 'register']);
$app->router->get( '/profile', [AuthController::class, 'profile']);

$app->router->get( '/logout', [AuthController::class, 'logout']);

//On lance la methode run de l'application
$app->run();

