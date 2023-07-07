<?php

require_once dirname(__FILE__) . "/../Models/TaskModel.php";


class TaskController
{
    public function __construct($request)
    {
        switch ($request["REQUEST_METHOD"]) {

            case "GET":
                $this->GET($_REQUEST);
                break;
            case "POST":
                $this->POST($_REQUEST);
                break;
            case "DELETE":
                $this->DELETE($_REQUEST);
                break;
            case "PATCH":
                $this->PATCH($_REQUEST);
                break;
            default:
                http_response_code(405);
        }
    }

    public function GET($data = null)
    {
        if (isset($data['tarefa_id'])) {
            $pdo_sql = "SELECT * FROM tarefas WHERE id=:tarefa_id";
            $pdo_statement = $GLOBALS['db']->prepare($pdo_sql);
            $pdo_result = $pdo_statement->execute(array(':tarefa_id' => $data['tarefa_id']));
            if ($pdo_result) {
                $pdo_result = $pdo_statement->fetchAll();
                return true;
            } else {
                return false;
            }
        }

        if (isset($data['usuario_id'])) {
            $pdo_sql = "SELECT * FROM tarefas WHERE usuario_id=:usuario_id";
            $pdo_statement = $GLOBALS['db']->prepare($pdo_sql);
            $pdo_result = $pdo_statement->execute(array(':usuario_id' => $data['usuario_id']));
            if ($pdo_result) {
                $pdo_result = $pdo_statement->fetchAll();
                return true;
            } else {
                return false;
            }
        }

    }

    public function POST($data = null)
    {

        


    }

    public function DELETE($data = null)
    {
        echo "view";
    }

    public function PATCH($data = null)
    {
        echo "view";
    }
}
