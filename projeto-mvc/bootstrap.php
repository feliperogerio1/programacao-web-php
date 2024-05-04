<?php

require __DIR__."/vendor/autoload.php";

$metodo = $_SERVER['REQUEST_METHOD'];
$caminho = $_SERVER['PATH_INFO'] ?? '/';

$r = new Php\Projetomvc\Router($metodo, $caminho);

$r->get('/subject', 'Php\Projetomvc\Controllers\SubjectController@index');
$r->get('/subject/{acao}/{status}', 'Php\Projetomvc\Controllers\SubjectController@index');
$r->get('/subject/insert', 'Php\Projetomvc\Controllers\SubjectController@insert');
$r->post('/subject/new', 'Php\Projetomvc\Controllers\SubjectController@new');
$r->get('/subject/update/id/{id}', 'Php\Projetomvc\Controllers\SubjectController@update');
$r->post('/subject/edit', 'Php\Projetomvc\Controllers\SubjectController@edit');
$r->get('/subject/delete/id/{id}', 'Php\Projetomvc\Controllers\SubjectController@delete');
$r->post('/subject/erase', 'Php\Projetomvc\Controllers\SubjectController@erase');

$r->get('/content', 'Php\Projetomvc\Controllers\ContentController@index');
$r->get('/content/{acao}/{status}', 'Php\Projetomvc\Controllers\ContentController@index');
$r->get('/content/insert', 'Php\Projetomvc\Controllers\ContentController@insert');
$r->post('/content/new', 'Php\Projetomvc\Controllers\ContentController@new');
$r->get('/content/update/id/{id}', 'Php\Projetomvc\Controllers\ContentController@update');
$r->post('/content/edit', 'Php\Projetomvc\Controllers\ContentController@edit');
$r->get('/content/delete/id/{id}', 'Php\Projetomvc\Controllers\ContentController@delete');
$r->post('/content/erase', 'Php\Projetomvc\Controllers\ContentController@erase');

$r->get('/session', 'Php\Projetomvc\Controllers\SessionController@index');
$r->get('/session/{acao}/{status}', 'Php\Projetomvc\Controllers\SessionController@index');
$r->get('/session/insert', 'Php\Projetomvc\Controllers\SessionController@insert');
$r->post('/session/new', 'Php\Projetomvc\Controllers\SessionController@new');
$r->get('/session/update/id/{id}', 'Php\Projetomvc\Controllers\SessionController@update');
$r->post('/session/edit', 'Php\Projetomvc\Controllers\SessionController@edit');
$r->get('/session/delete/id/{id}', 'Php\Projetomvc\Controllers\SessionController@delete');
$r->post('/session/erase', 'Php\Projetomvc\Controllers\SessionController@erase');

$r->get('/tool', 'Php\Projetomvc\Controllers\ToolController@index');
$r->get('/tool/{acao}/{status}', 'Php\Projetomvc\Controllers\ToolController@index');
$r->get('/tool/insert', 'Php\Projetomvc\Controllers\ToolController@insert');
$r->post('/tool/new' , 'Php\Projetomvc\Controllers\ToolController@new');
$r->get('/tool/update/id/{id}', 'Php\Projetomvc\Controllers\ToolController@update');
$r->post('/tool/edit', 'Php\Projetomvc\Controllers\ToolController@edit');
$r->get('/tool/delete/id/{id}', 'Php\Projetomvc\Controllers\ToolController@delete');
$r->post('/tool/erase', 'Php\Projetomvc\Controllers\ToolController@erase');

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