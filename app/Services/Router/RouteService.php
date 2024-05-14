<?php

namespace App\Services\Router;

class RouteService
{
    private static $routes = [];
    private static $params = [];
    private static $controllerNamespace = 'App\Controllers\\';

    public static function add($uri, $controller, $action, $method = 'GET', $middleware = [])
    {
        self::$routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'action' => $action,
            'middleware' => $middleware
        ];
    }

    public static function get($uri, $controller, $action, $middleware = [])
    {
        self::add($uri, $controller, $action, 'GET', $middleware);
    }

    public static function post($uri, $controller, $action, $middleware = [])
    {
        self::add($uri, $controller, $action, 'POST', $middleware);
    }

    private static function handleDynamicRoute($route, $requestURI)
    {
        // Route has dynamic segments, check if it matches
        $request_path = explode('/', trim($requestURI, '/'));
        $uri = explode('/', trim($route['uri'], '/'));
        $url_found = false;

        if (count($uri) == count($request_path)) {
            $url_found = true;
            for ($i = 0; $i < count($uri); $i++) {
                if (strpos($uri[$i], '{') !== false) {
                    $key = trim($uri[$i], '{}');
                    self::$params[$key] = $request_path[$i];
                } elseif ($uri[$i] != $request_path[$i]) {
                    $url_found = false;
                    break;
                }
            }
        } else {
            $url_found = false;
        }
        return $url_found;
    }

    private static function separateRoutes()
    {
        // Separate static and dynamic routes
        $staticRoutes = [];
        $dynamicRoutes = [];

        foreach (self::$routes as $route) {
            if (strpos($route['uri'], '{') !== false) {
                // Route contains dynamic segments
                $dynamicRoutes[] = $route;
            } else {
                // Route is static
                $staticRoutes[] = $route;
            }
        }

        // Merge static and dynamic routes, placing dynamic routes at the end
        return array_merge($staticRoutes, $dynamicRoutes);
    }

    public static function handle()
    {
        $requestURI = $_SERVER['REQUEST_URI'];
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        // Sort routes with dynamic segments moved to the end
        $routes = self::separateRoutes();

        try {
            foreach ($routes as $route) {
                if ($route['method'] == $requestMethod) {
                    // Check for exact match
                    if ('/' . $route['uri'] === $requestURI) {
                        $url_found = true;
                    } else {
                        // Route has dynamic segments, check if it matches
                        $url_found = self::handleDynamicRoute($route, $requestURI);
                    }

                    if ($url_found) {
                        self::handleRoute($route);
                        return;
                    }
                }
            }

            throw new \Exception('404 - Page not found');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }


    private static function handleRoute($route)
    {
        // Handle middleware
        foreach ($route['middleware'] as $middleware) {
            $middlewareClass = new $middleware;
            $middlewareClass->handle();
        }

        // Get controller class and action method
        $controllerClass = self::$controllerNamespace . $route['controller'];
        $action = $route['action'];

        // Instantiate controller
        $controller = new $controllerClass();

        // Get method parameters
        $reflectionMethod = new \ReflectionMethod($controller, $action);
        $methodParameters = $reflectionMethod->getParameters();
        $parameters = [];

        foreach ($methodParameters as $parameter) {
            $paramName = $parameter->getName();
            if (isset(self::$params[$paramName])) {
                $parameters[] = self::$params[$paramName];
            } else {
                $parameters[] = null;
            }
        }

        // Call action method with parameters
        call_user_func_array([$controller, $action], $parameters);
    }
}
