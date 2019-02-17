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

$settings = $container->get('settings');
$settings->replace([
    'displayErrorDetails' => true
]);


$container['gestor'] = function ($container) {
    $bootstrap = new Bootstrap();
    $gestor = $bootstrap->getEntityManager();
    return $gestor;
    //return 'yo soy el gestor';
};

$app->group('/api', function () use ($app) {
    // Version group
    $app->group('/v1', function () use ($app) {
        
        $app->group('/zapatos', function () use ($app) {
            $app->get('/get', function (Request $request, Response $response, array $args) {
                    $sql = "SELECT * FROM zapato";
                    $stmt = getConnection()->query($sql);
                    $zapatos = $stmt->fetchAll(PDO::FETCH_OBJ);
                    $db = null;
                    
                    return json_encode($zapatos);
            });
        });
    
        $app->get('/categorias', function (Request $request, Response $response, array $args) {
                $sql = "SELECT * FROM categoria";
                $stmt = getConnection()->query($sql);
                $categorias = $stmt->fetchAll(PDO::FETCH_OBJ);
                $db = null;
                
                return json_encode($categorias);
        });
    });
});



function getConnection() {
    $dbhost="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="slim-android";
    $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbh;
}

$app->run();