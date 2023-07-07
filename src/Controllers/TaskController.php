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
