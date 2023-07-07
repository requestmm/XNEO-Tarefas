<?php

require_once dirname(__FILE__). "/../Models/UserModel.php";


class UserController{
    public function __construct($request)
    {

        switch($request["REQUEST_METHOD"]){
            case "GET":
                $this->GET($_REQUEST['email'], $_REQUEST['senha']);
                break;
            case "POST":
                $this->POST($_REQUEST['email'], $_REQUEST['senha']);
                break;
            default:
                http_response_code(405);

        }
    }

    public function GET($email, $senha){
        return UserModel::logar($email, $senha);
    }

    public function POST($email, $senha){
        return UserModel::cadastrar($email, $senha);
    }


}