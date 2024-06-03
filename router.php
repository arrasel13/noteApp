<?php
function routeToController($uri, $routes)
{
    if(array_key_exists($uri, $routes))
    {
        require $routes[$uri];
    } else {
        abort(Responses::NOTFOUND);
    }
}

function abort($status = Responses::NOTFOUND)
{
    http_response_code($status);
    require "views/{$status}.php";
}


$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$routes = require 'routes.php';

routeToController($uri, $routes);