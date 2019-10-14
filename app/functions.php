<?php

use Illuminate\Routing\Router;

if (!function_exists('generateCRUDRoutes')) {
    try {
        /**
         * @param Router  $router
         * @param string $basePath
         * @param string $controller
         */
        function generateCRUDRoutes(Router $router, string $basePath, string $controller)
        {
            $router->get($basePath, $controller . '@index');
            $router->get($basePath . '/{id}', $controller . '@show');
            $router->delete($basePath . '/{id}', $controller . '@destroy');
            $router->put($basePath . '/{id}', $controller . '@update');
            $router->post($basePath, $controller . '@store');
        }
    } catch (\Exception $ex) {
    }
}
