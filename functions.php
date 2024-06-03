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
