<?php

use Petrik\Rajzfilmek\Rajzfilm;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

return function(Slim\App $app){
    $app -> get('/rajzfilmek', function(Request $request, Response $response){
        $rajzfilmek = Rajzfilm::osszes();
        $out = json_encode($rajzfilmek);

        $response->getBody()->write($out);
        return $response->withHeader('Content-type', 'application/json');        
    });
    $app -> post('/rajzfilmek',function (Request $request, Response $response){
        $in = json_decode($request->getBody(), true);
        # validation 100
        $rajzfilm = new Rajzfilm();
        $rajzfilm->setAttributes($in);
        $rajzfilm->uj();
        $out=json_encode($rajzfilm);
        $response->getBody()->write($out);
        return $response->withStatus(201)->withHeader('Content-type', 'application/json');
    });
    $app->delete('/rajzfilmek/{id}', function(Request $request, Response $response, array $args){
        if(!is_numeric($args['id']) || $args['id'] <= 0){
            $out = json_encode(['error' => 'Az idnak pozitiv egesznek kell lennie!']);
            $response->getBody()->write($out);
            return $response->withStatus(400)->withHeader('Content-type', 'application/json');
        }
        $rajzfilm = Rajzfilm::getById($args['id']);
        if ($rajzfilm === null) {
            $out = json_encode(['error' => 'Nincs ilyen id a tablaban!']);
            $response->getBody()->write($out);
            return $response->withStatus(404)->withHeader('Content-type', 'application/json');
        }
        $rajzfilm->torles();
        return $response->withStatus(204);
    });
};