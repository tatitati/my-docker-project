<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get(
	'/person/{id}', 
	function (Request $request, Response $response) {
	    $id = $request->getAttribute('id');
	    $response->getBody()->write("Hello, $id");

	    // fetch from database this user id and return it

	    return $response;    
});


$app->post(
	'/person', 
	function (Request $request, Response $response) {
	$name = $request->getParsedBody()['name'];	
    //$name = $request->getAttribute('name');

    // $response->getBody()->write("Hello, $name");
    // return $response->withStatus(302);

    return $response->withJson(
    	['name' => $name, 'age' => 40], 
    	302
	);
});