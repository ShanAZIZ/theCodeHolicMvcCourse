<?php

namespace app\core;

use COM;

class Application 
/*
 * Class Application
 * Instancie les elements : router, response, db et controller
 */

{
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public Database $db;
    public Session $session;
    public Controller $controller;
    public static Application $app;
    
    public function __construct($rootPath, array $config)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);

        $this->db = new Database($config['db']);
    }

    public function run()
    {
        //Au depart de l'application on resout l'url avec la methode resolve (Grace a la classe router)
        echo $this->router->resolve();
    }

    public function getController(){
        return $this->controller;
    }


    public function setController(Controller $controller) :void{
        $this->controller = $controller;
    }
}