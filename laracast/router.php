<?php
// $uri = $_SERVER['REQUEST_URI'];

// if ($uri === '/laracast/') {
//     require 'controllers/index.php';
// } else if (str_contains($uri, '/about')) {
//     require 'controllers/about.php';
// } else if (str_contains($uri, '/contact')) {
//     require 'controllers/contact.php';
// }

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/laracast/' => 'controllers/index.php',
    '/laracast/about' => 'controllers/about.php',
    '/laracast/contact' => 'controllers/contact.php'
];

function routeToController($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort(404);
    }
}

function abort($code = 404)
{
    http_response_code($code);
    require "views/404.php";
    die();
}

routeToController($uri, $routes);
