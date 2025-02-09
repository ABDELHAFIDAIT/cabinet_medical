<?php

namespace Core;



class Router{
    private $controller = 'HomeController';
	private $method 	= 'index';

    
	public function __construct()
	{
		$URL = $this->splitURL();


		if(file_exists(__DIR__ . "/../app/controllers/".ucfirst($URL[0])."Controller.php"))
		{
            $this->controller = ucfirst($URL[0]) . "Controller";
			unset($URL[0]);
		}

        require __DIR__ . "/../app/controllers/{$this -> controller}.php";

		$controller = new $this->controller;
		if(!empty($URL[1]))
		{
			if(method_exists($controller, $URL[1]))
			{
				$this->method = $URL[1];
				unset($URL[1]);
			}	
		}

		call_user_func_array([$controller,$this->method], $URL);
    }

	private function splitURL()
	{
		$URL = $_GET['url'] ?? 'home';
		$URL = explode("/", trim($URL,"/"));
		return $URL;	
	}

}




// class Router
// {
//     private $routes = [];

//     public function add($method, $route, $controller, $action)
//     {
//         $this->routes[] = [
//             'method' => $method,
//             'route' => $route,
//             'controller' => $controller,
//             'action' => $action
//         ];
//     }

//     public function resolve($url, $method)
//     {
//         foreach ($this->routes as $route) {
//             if ($route['method'] === $method && preg_match("~^" . $route['route'] . "$~", $url)) {
//                 $controllerName = 'App\\Controllers\\' . $route['controller'];
//                 $controller = new $controllerName();
//                 $action = $route['action'];
//                 $controller->$action();
//                 return;
//             }
//         }

//         require '../app/views/errors/404.php';
//     }
// }


// method : HTTP method (GET, POST, PUT, DELETE)
// route : URL pattern
// controller : Controller class name
// action : Method name of the controller class

//resolve() method is used to match the URL with the registered routes and call the appropriate controller method from routes table.