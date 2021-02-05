<?php

namespace app\core;

class Controller
{
    public string $layout = "main";
    public string $actions = '';

    /**
     * @var \app\core\middlewares\BaseMiddleware[] $middlewares
     */
    protected array $middlewares = [];

    public function render($view, $params = [])
    {
        return Application::$app->view->renderView($view, $params);
    }

    public function setLayout($layout){
        $this->layout = $layout;
    }

    public function registerMiddleware($middleware)
    {
        $this->middlewares[] = $middleware;
    }

    /**
     * @return middlewares\BaseMiddleware[]
     */
    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }


}