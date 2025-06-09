<?php

class Router {
    private function parseUrl() {
        if(isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            return explode('-', $url);
        }
        return [''];
    }

    public function route() {
        $params = $this->parseUrl();
          // If the URL is empty, load home page
        if(empty($params[0])) {
            $controller = new \App\View\HomeView();
            return $controller->index();
        }

        // Split the first parameter to check if it contains a controller name
        $controllerParts = explode('/', $params[0]);
          // Determine the controller and method
        if(count($controllerParts) > 1) {
            // Case: /controller/method
            $controllerName = 'App\\View\\' . ucfirst($controllerParts[0]) . 'View';
            $method = $controllerParts[1];
            array_shift($params); // Remove the full first parameter
        } else {
            // Case: /method or /method-param1-param2...
            $controllerName = 'App\\View\\HomeView';
            $method = $controllerParts[0];
        }

        $controllerFile = __DIR__ . '/views/' . str_replace('App\\View\\', '', $controllerName) . '.php';
        if(file_exists($controllerFile)) {
            require_once $controllerFile;
            $controller = new $controllerName();
            
            // Check if method exists
            if(method_exists($controller, $method)) {
                // Remove the method name from parameters if it's the first element
                if($params[0] === $method) {
                    array_shift($params);
                }
                // Call the method with remaining parameters
                return call_user_func_array([$controller, $method], $params);
            }
        }

        // If we get here, either the controller or method wasn't found
        header("HTTP/1.0 404 Not Found");
        echo "Page not found";
    }
}

// Initialize autoloader for views
spl_autoload_register(function($class) {
    // Convert namespace to path
    $class = str_replace('App\\View\\', '', $class);
    $file = __DIR__ . '/views/' . $class . '.php';
    if(file_exists($file)) {
        require_once $file;
    }
});


// Global variables for the view like Api BaseURL
define('API', 'https://frozen-chandal-admin-elmes-d89f2982.koyeb.app/api');

// Start the router
$router = new Router();
$router->route();