<?php

use Petrik\Rajzfilmek\Kategoria;
use Petrik\Rajzfilmek\Rajzfilm;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

return function(Slim\App $app){
    $app -> get('/rajzfilmek', function(Request $request, Response $response){
        $rajzfilmek = Rajzfilm::all();
        $out = $rajzfilmek->toJson();

        $response->getBody()->write($out);
        return $response->withHeader('Content-type', 'application/json');        
    });
    $app -> post('/rajzfilmek',function (Request $request, Response $response){
        $in = json_decode($request->getBody(), true);
        # validation 100
        $rajzfilm = Rajzfilm::create($in);
        $rajzfilm->save();
        $out=$rajzfilm->toJson();
        $response->getBody()->write($out);
        return $response->withStatus(201)->withHeader('Content-type', 'application/json');
    });
    $app->delete('/rajzfilmek/{id}', function(Request $request, Response $response, array $args){
        if(!is_numeric($args['id']) || $args['id'] <= 0){
            $out = json_encode(['error' => 'Az idnak pozitiv egesznek kell lennie!']);
            $response->getBody()->write($out);
            return $response->withStatus(400)->withHeader('Content-type', 'application/json');
        }
        $rajzfilm = Rajzfilm::find($args['id']);
        if ($rajzfilm === null) {
            $out = json_encode(['error' => 'Nincs ilyen id a tablaban!']);
            $response->getBody()->write($out);
            return $response->withStatus(404)->withHeader('Content-type', 'application/json');
        }
        $rajzfilm->delete();
        return $response->withStatus(204);
    });
    $app->put('/rajzfilmek/{id}', function(Request $request, Response $response, array $args){
        if(!is_numeric($args['id']) || $args['id'] <= 0){
            $out = json_encode(['error' => 'Az idnak pozitiv egesznek kell lennie!']);
            $response->getBody()->write($out);
            return $response->withStatus(400)->withHeader('Content-type', 'application/json');
        }
        $rajzfilm = Rajzfilm::find($args['id']);
        if ($rajzfilm === null) {
            $out = json_encode(['error' => 'Nincs ilyen id a tablaban!']);
            $response->getBody()->write($out);
            return $response->withStatus(404)->withHeader('Content-type', 'application/json');
        }
        $in = json_decode($request->getBody(), true);
        $rajzfilm->fill($in);
        $rajzfilm->save();
        $response->getBody()->write($rajzfilm->toJson());
        return $response->withStatus(200)->withHeader('Content-type', 'application/json');
    });
    $app->get('/rajzfilmek/{id}', function(Request $request, Response $response, array $args){
        if(!is_numeric($args['id']) || $args['id'] <= 0){
            $out = json_encode(['error' => 'Az idnak pozitiv egesznek kell lennie!']);
            $response->getBody()->write($out);
            return $response->withStatus(400)->withHeader('Content-type', 'application/json');
        }
        $rajzfilm = Rajzfilm::find($args['id']);
        if ($rajzfilm === null) {
            $out = json_encode(['error' => 'Nincs ilyen id a tablaban!']);
            $response->getBody()->write($out);
            return $response->withStatus(404)->withHeader('Content-type', 'application/json');
        }
        $response->getBody()->write($rajzfilm->toJson());
        return $response->withStatus(200)->withHeader('Content-type', 'application/json');
    });


    $app->get('/kategoria', function(Request $request, Response $response, array $args){$kategoria = Kategoria::all();
        $out = $kategoria->toJson();
        $response->getBody()->write($out);
        return $response->withHeader('Content-type', 'application/json');        
    });
    $app -> post('/kategoria',function (Request $request, Response $response){
        $in = json_decode($request->getBody(), true);
        # validation 100
        $kategoria = Kategoria::create($in);
        $kategoria->save();
        $out=$kategoria->toJson();
        $response->getBody()->write($out);
        return $response->withStatus(201)->withHeader('Content-type', 'application/json');
    });
    $app->delete('/kategoria/{id}', function(Request $request, Response $response, array $args){
        if(!is_numeric($args['id']) || $args['id'] <= 0){
            $out = json_encode(['error' => 'Az idnak pozitiv egesznek kell lennie!']);
            $response->getBody()->write($out);
            return $response->withStatus(400)->withHeader('Content-type', 'application/json');
        }
        $kategoria = Kategoria::find($args['id']);
        if ($kategoria === null) {
            $out = json_encode(['error' => 'Nincs ilyen id a tablaban!']);
            $response->getBody()->write($out);
            return $response->withStatus(404)->withHeader('Content-type', 'application/json');
        }
        $kategoria->delete();
        return $response->withStatus(204);
    });
    $app->put('/kategoria/{id}', function(Request $request, Response $response, array $args){
        if(!is_numeric($args['id']) || $args['id'] <= 0){
            $out = json_encode(['error' => 'Az idnak pozitiv egesznek kell lennie!']);
            $response->getBody()->write($out);
            return $response->withStatus(400)->withHeader('Content-type', 'application/json');
        }
        $kategoria = Kategoria::find($args['id']);
        if ($kategoria === null) {
            $out = json_encode(['error' => 'Nincs ilyen id a tablaban!']);
            $response->getBody()->write($out);
            return $response->withStatus(404)->withHeader('Content-type', 'application/json');
        }
        $in = json_decode($request->getBody(), true);
        $kategoria->fill($in);
        $kategoria->save();
        $response->getBody()->write($kategoria->toJson());
        return $response->withStatus(200)->withHeader('Content-type', 'application/json');
    });
    $app->get('/kategoria/{id}', function(Request $request, Response $response, array $args){
        if(!is_numeric($args['id']) || $args['id'] <= 0){
            $out = json_encode(['error' => 'Az idnak pozitiv egesznek kell lennie!']);
            $response->getBody()->write($out);
            return $response->withStatus(400)->withHeader('Content-type', 'application/json');
        }
        $kategoria = Kategoria::find($args['id']);
        if ($kategoria === null) {
            $out = json_encode(['error' => 'Nincs ilyen id a tablaban!']);
            $response->getBody()->write($out);
            return $response->withStatus(404)->withHeader('Content-type', 'application/json');
        }
        $response->getBody()->write($kategoria->toJson());
        return $response->withStatus(200)->withHeader('Content-type', 'application/json');
    });
};