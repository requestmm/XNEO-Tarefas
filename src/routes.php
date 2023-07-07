<?php

require_once "boot.php";
require_once "Route.php";
require_once dirname(__FILE__) . "/Controllers/TaskController.php";

Route::GET("/", function (){
    echo "index";
});

Route::RESOURCE("/tarefas", 'TaskController');
Route::RESOURCE("/usuarios", 'UserController');

Route::NOT_FOUND(function(){
    echo "Rota não encontrada";
    http_response_code(404);
});