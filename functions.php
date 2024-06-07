<?php

function dd($value)
{
    echo "</pre>";
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