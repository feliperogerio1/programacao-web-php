<?php

require __DIR__."/vendor/autoload.php";

$metodo = $_SERVER['REQUEST_METHOD'];
$caminho = $_SERVER['PATH_INFO'] ?? '/';

$r = new Php\Projetomvc\Router($metodo, $caminho);

$r->get('/subject/insert', 'Php\Projetomvc\Controllers\SubjectController@insert');

$r->post('/subject/new', 'Php\Projetomvc\Controllers\SubjectController@new');

$r->get('/content/insert', 'Php\Projetomvc\Controllers\ContentController@insert');

$r->post('/content/new', 'Php\Projetomvc\Controllers\ContentController@new');

$r->get('/session/insert', 'Php\Projetomvc\Controllers\SessionController@insert');

$r->post('/session/new', 'Php\Projetomvc\Controllers\SessionController@new');

$r->get('/tool/insert', 'Php\Projetomvc\Controllers\ToolController@insert');

$r->post('/tool/new' , 'Php\Projetomvc\Controllers\ToolController@new');

$resultado = $r->handler();

if(!$resultado){
    http_response_code(404);
    echo "Página não encontrada!";
    die();
}

if ($resultado instanceof Closure){
    echo $resultado($r->getParams());
} elseif (is_string($resultado)){
    $resultado = explode("@", $resultado);
    $controller = new $resultado[0];
    $resultado = $resultado[1];
    echo $controller->$resultado($r->getParams());
}