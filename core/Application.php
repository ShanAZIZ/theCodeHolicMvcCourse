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

    public string $layout = 'main';
    public string $userClass;
    public Router $router;
    public Request $request;
    public Response $response;
    public Database $db;
    public Session $session;
    public ?Controller $controller = null;
    public ?DbModel $user;
    public static Application $app;
    public View $view;
    
    public function __construct($rootPath, array $config)
    {
        $this->userClass = $config['userClass'];
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);
        $this->view = new View();

        $this->db = new Database($config['db']);
        $primaryValue = $this->session->get('user');
        if($primaryValue){
            $primaryKey = $this->userClass::primaryKey();
            $this->user = $this->userClass::findOne([ $primaryKey => $primaryValue ]);
        } else {
            $this->user = null;
        }

    }

    public function run()
    {
        //Au depart de l'application on resout l'url avec la methode resolve (Grace a la classe router)
        try{
            echo $this->router->resolve();
        }catch (\Exception $e) {
            $this->response->setStatusCode($e->getCode());
            echo $this->view->renderView('_errors', [
                'exception' => $e
            ]);
        }

    }

    public function getController(){
        return $this->controller;
    }


    public function setController(Controller $controller) :void{
        $this->controller = $controller;
    }

    public static function isGuest()
    {
        return !self::$app->user;
    }

    public function login(DbModel $user)
    {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryKey = $user->{$primaryKey};
        $this->session->set('user', $primaryKey);
        return true;
    }

    public function logout()
    {
        $this->user =null;
        $this->session->remove('user');
    }

}