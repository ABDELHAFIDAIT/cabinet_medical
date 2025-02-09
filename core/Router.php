<?php

namespace Core;

class Router
{
    private $routes = [];

    public function add($method, $route, $controller, $action)
    {
        $this->routes[] = [
            'method' => $method,
            'route' => $route,
            'controller' => $controller,
            'action' => $action
        ];
    }

    public function resolve($url, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['method'] === $method && preg_match("~^" . $route['route'] . "$~", $url)) {
                $controllerName = 'App\\Controllers\\' . $route['controller'];
                $controller = new $controllerName();
                $action = $route['action'];
                $controller->$action();
                return;
            }
        }

        // $this->render404();

        $controllerName = 'App\\Controllers\\ErrorController';
        $controller = new $controllerName();
        $controller->notFound();
    }

    // public function render404()
    // {
        // $view = new View();
        // $view->render('errors/404');
    // }

    
}


// method : HTTP method (GET, POST, PUT, DELETE)
// route : URL pattern
// controller : Controller class name
// action : Method name of the controller class

//resolve() method is used to match the URL with the registered routes and call the appropriate controller method from routes table.