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
};

$app->group('/api', function () use ($app) {
    // Version group
    $app->group('/v1', function () use ($app) {
        
        $app->group('/zapatos', function () use ($app) {
            $app->get('/get', function (Request $request, Response $response, array $args) {
                    $gestor = $this->get('gestor');
                    $zapatos = $gestor->getRepository('data\Zapato')->findAll();
                    
                    return json_encode($zapatos);
            });
            
            $app->get('/get/{id}', function (Request $request, Response $response, array $args) {
                $id = $args['id'];
                $gestor = $this->get('gestor');
                $zapato = $gestor->find('data\Zapato', $id);
                return json_encode($zapato);
            });
            
            $app->post('/add', function (Request $request, Response $response, array $args) {
                $gestor = $this->get('gestor');
                $parsedBody = $request->getParsedBody();
                
                $marca = $parsedBody['marca'];
                $modelo = $parsedBody['modelo'];
                $precio = $parsedBody['precio'];
                
                $zapato = new Zapato();
                
                $zapato->setMarca($marca);
                $modelo->setModelo($modelo);
                $precio->setPrecio($precio);
                
                $gestor->persist($zapato);
                $gestor->flush();
                
                $response = '[{"estado": "true", "id" : ' . $id . ', "modelo" :"' . $zapato->getModelo() . '", "marca" : "' . $zapato->getMarca() . '"}]';
                
                return $response; 
            });
            
            $app->delete('/delete/{id}', function (Request $request, Response $response, array $args) {
                $id = $args['id'];
                $gestor = $this->get('gestor');
                 
                $zapato = $gestor->find('data\Zapato', $id); //Hago esta consulta para poder devolver la info del zapato que se ha borrado
                $gestor->remove($zapato);
                $gestor->flush();
                
                $response = '[{"estado": "true", "id" : ' . $id . ', "modelo" :"' . $zapato->getModelo() . '", "marca" : "' . $zapato->getMarca() . '"}]';
                
                return $response;
            });
        });
        
        $app->group('/categorias', function () use ($app) {
            $app->get('/get', function (Request $request, Response $response, array $args) {
                    $gestor = $this->get('gestor');
                    $categorias = $gestor->getRepository('data\Categoria')->findAll();
                    
                    return json_encode($categorias);
            });
            
            $app->get('/get/{id}', function (Request $request, Response $response, array $args) {
                $id = $args['id'];
                $gestor = $this->get('gestor');
                $categoria = $gestor->find('data\Categoria', $id);
                return json_encode($categoria);
            });
            
            $app->post('/add', function (Request $request, Response $response, array $args) {
                $gestor = $this->get('gestor');
                $parsedBody = $request->getParsedBody();
                
                $nombre = $parsedBody['nombre'];
                
                $categoria = new Categoria();
                
                $categoria->setNombre($nombre);
                
                $gestor->persist($categoria);
                $gestor->flush();
                
                $response = '[{"estado": "true", "id" : ' . $id . ', "nombre" :"' . $categoria->getNombre() . '"}]';
                
                return $response; 
            });
            
            $app->delete('/delete/{id}', function (Request $request, Response $response, array $args) {
                $id = $args['id'];
                $gestor = $this->get('gestor');
                 
                $categoria = $gestor->find('data\Categoria', $id); //Hago esta consulta para poder devolver la info de la categoria que se ha borrado
                $sql = "delete FROM categoria where id = " . $id;
                $stmt = getConnection()->query($sql);
                $db = null;
                
                $response = '[{"estado": "true", "id" : ' . $id . ', "nombre" :"' . $categoria->getNombre() . '"}]';
                
                return $response;
            });
        });
    });
});

$app->run();