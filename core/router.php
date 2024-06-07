<?php
function routeToController($uri, $routes)
{
    if(array_key_exists($uri, $routes))
    {
        require base_path($routes[$uri]);
    } else {
        abort(Responses::NOTFOUND);
    }
}

function abort($status = Responses::NOTFOUND)
{
    http_response_code($status);
    require "views/{$status}.php";
    exit();
}


$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$routes = require base_path('routes.php');

routeToController($uri, $routes);