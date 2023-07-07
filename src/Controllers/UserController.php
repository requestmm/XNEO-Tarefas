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
        $usuario = UserModel::logar($email, $senha);
        if($usuario)
        {
            
            $_SESSION['usuario'] = $usuario;
            header( "refresh:5;URL=/tarefas" );
            echo "Logado com sucesso. Redirecionando...";
        }else{
            header( "refresh:5;URL=/cadastrar" );
            echo "Falha ao logar. Tente mais tarde novamente.";
        }
    }

    public function POST($email, $senha){
        $usuario = UserModel::cadastrar($email, $senha);
        if($usuario)
        {
            
            $_SESSION['usuario'] = $usuario;
            header( "refresh:5;URL=/tarefas" );
            echo "Cadastrado com sucesso. Redirecionando...";
        }else{
            header( "refresh:5;URL=/cadastrar" );
            echo "Falha ao cadastrar. Tente mais tarde novamente.";
        }
    }


}