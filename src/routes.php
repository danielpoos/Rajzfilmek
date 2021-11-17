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
};