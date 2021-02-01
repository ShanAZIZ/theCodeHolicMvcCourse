<?php

namespace app\core;

class Router
{

    protected array $routes = [];
    public Request $resquest;

    public function __construct(\app\core\Request $request){
        $this->request = $request;
    }
    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;
        if($callback === false){
            echo "Not found";
            exit;
        }
        echo call_user_func($callback);
    }
}