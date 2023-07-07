<?php

class TaskModel{
    static public function view($limit = null){
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

    static public function create($data = null){
        $pdo_sql = "INSERT INTO tarefas ( usuario_id, descricao ) VALUES ( :usuario_id, :descricao )";
	    $pdo_statement = $GLOBALS['db']->prepare( $pdo_sql );

        $pdo_result = $pdo_statement->execute( array( ':usuario_id'=>$data['usuario_id'], ':descricao'=>$data['descricao']) );

        if($pdo_result){
            return true;
        }else{
            return false;
        }
    }

    static public function update($data = null){
        $pdo_sql = "UPDATE tarefas SET situacao=:situacao, descricao=:descricao  WHERE id=:tarefa_id";
	    $pdo_statement = $GLOBALS['db']->prepare( $pdo_sql );

        $pdo_result = $pdo_statement->execute( array( ':tarefa_id'=>$data['tarefa_id'], ':situacao'=>$data['situacao'], ':descricao'=>$data['descricao']) );

        if($pdo_result){
            return true;
        }else{
            return false;
        }
    }

    static public function soft_delete($data = null){
        $pdo_sql = "UPDATE tarefas SET situacao=:situacao WHERE id=:tarefa_id";
	    $pdo_statement = $GLOBALS['db']->prepare( $pdo_sql );

        $pdo_result = $pdo_statement->execute( array( ':tarefa_id'=>$data['tarefa_id'], ':situacao'=>'-1') );

        if($pdo_result){
            return true;
        }else{
            return false;
        }
    }

}