<?php

use core\Responses;

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    exit();
}

function urlIs($value)
{
    return parse_url($_SERVER['REQUEST_URI'])['path'] === $value;
}

function authorize($condition, $status = Responses::NOTAUTHORIZED)
{
    if (! $condition) {
        return abort($status);
    }
}

function abort($status = Responses::NOTFOUND)
{
    http_response_code($status);
    require base_path("views/{$status}.php");
    exit();
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $args = []){
    extract($args);
    return require base_path("views/{$path}");
}