<?php
require 'config/routes.php';

$uriPath = parse_url($_SERVER['REQUEST_URI'])['path'];

function urlToController($uriPath, $routes)
{
  if ( array_key_exists($uriPath, $routes) ) :
    require $routes[$uriPath];
  else:
    abort();
  endif;
}

function abort($code=404)
{
  http_response_code($code);
  require "views/$code.php";
  exit();
}

urlToController($uriPath, $routes);