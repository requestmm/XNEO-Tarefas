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
        

    }

    public function POST($data = null)
    {
        
        $pdo_sql = "INSERT INTO tarefas ( usuario_id, descricao, situacao ) VALUES ( :usuario_id, :descricao, 0 )";
	    $pdo_statement = $GLOBALS['db']->prepare( $pdo_sql );
	    $pdo_result = $pdo_statement->execute( array( ':usuario_id'=>$_REQUEST['usuario_id'], ':descricao'=>$_REQUEST['descricao']) );


    }

    public function DELETE($data = null)
    {
        echo "view";
    }

    public function PATCH($data = null)
    {
        parse_str(file_get_contents('php://input'), $patch);
        if (is_array($patch)) {
        $data = array_merge($data, $patch);
        }
        $query = $GLOBALS["DB"]->prepare("UPDATE tarefas SET descricao=:descricao, situacao=:situacao WHERE id=:id ");
        $result = $query->execute(array(":descricao" => $data["descricao"], ":situacao" => $data["acao"], ":id" => $data["tarefa_id"]));
        var_dump($result);
        return $result;

    }
}
