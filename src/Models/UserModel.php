<?php

class UserModel{
    static public function logar($email, $senha){
        $senha = crypt($senha, $GLOBALS['env']['HASH_ENGINE']);

        $pdo_sql = "SELECT * FROM usuarios WHERE email=:email";
	    $pdo_statement = $GLOBALS['db']->prepare( $pdo_sql );
	    $pdo_result = $pdo_statement->execute( array( ':email'=>$email) );
        if($pdo_result){
            $pdo_result = $pdo_statement->fetchAll();
            $check = hash_equals($senha, $pdo_result[0]["senha"]);

            if($check){
                return ['email' => $email];
            }
            else{
                return false;
            }
        }else{
            return false;
        }
    }

    static public function cadastrar($email, $senha){

        $senha = crypt($senha, $GLOBALS['env']['HASH_ENGINE']);

        $pdo_sql = "INSERT INTO usuarios ( email, senha ) VALUES ( :email, :senha )";
	    $pdo_statement = $GLOBALS['db']->prepare( $pdo_sql );
	    $pdo_result = $pdo_statement->execute( array( ':email'=>$email, ':senha'=>$senha) );

        if($pdo_result){
            return ['email'=>$email];
        }else{
            return false;
        }

    }

}