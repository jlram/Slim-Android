<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Slim\App;
use \Slim\Container;
use Slim\Http\UploadedFile;
use managedata\Bootstrap;
use data\Zapato;
use data\Categoria;
use data\Prueba;

require 'classes/autoload.php';
require 'classes/vendor/autoload.php';
require 'vendor/autoload.php';

$container = new Container();
$app = new App($container);

$app->group('/api', function () use ($app) {
  // Version group
  $app->group('/v1', function () use ($app) {
    $app->get('/zapatos/', 'obtenerZapatos');
    $app->get('/categorias', 'obtenerCategorias');
  });
});

function obtenerCategorias($response) {
  $response = new Prueba();
  
 echo '{"victor":{"sexo":"mucho"}}';
}

$app->run();