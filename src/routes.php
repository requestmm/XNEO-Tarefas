<?php

require_once "boot.php";
require_once "Route.php";
require_once dirname(__FILE__) . "/Controllers/TaskController.php";

Route::GET("/", function (){
    if(isset($_SESSION['usuario'])){
        header( "refresh:5;URL=/tarefas" );
        echo "Você já está logado. Redirecionando..";
        die();
    }
    include_once dirname(__FILE__) . "/Views/acessar.php";
});
Route::GET("/sair", function (){
    include_once dirname(__FILE__) . "/Views/sair.php";
});

Route::GET("/cadastrar", function (){
    include_once dirname(__FILE__) . "/Views/cadastrar.php";
});

Route::GET("/tarefas", function (){
    $usuarios = $GLOBALS['DB']->query("SELECT * FROM usuarios WHERE 1=1")->fetchAll();
    $tarefas = $GLOBALS['DB']->query("SELECT tarefas.*, usuarios.*, tarefas.id AS tarefa_id FROM tarefas INNER JOIN usuarios ON tarefas.usuario_id=usuarios.id WHERE tarefas.situacao<>'-1'")->fetchAll();
    include_once dirname(__FILE__) . "/Views/tarefas.php";
});

Route::RESOURCE("/api/tarefas", 'TaskController');
Route::RESOURCE("/api/usuarios", 'UserController');

Route::NOT_FOUND(function(){
    echo "Rota não encontrada";
    http_response_code(404);
});