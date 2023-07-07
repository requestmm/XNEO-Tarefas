<?php
$env = parse_ini_file(__DIR__."/.env");
$GLOBALS['env'] = $env;
try {
    $conn_string = 'mysql:host='.$env["DB_HOSTNAME"].';dbname='.$env["DB_NAME"].'';
    $DB = new PDO($conn_string, $env["DB_USER"], $env["DB_PASSWORD"]);
    // set the PDO error mode to exception
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $GLOBALS['db'] = $DB;
    session_start();
    
  } catch(PDOException $e) {
    echo "Falha na conexão no banco de dados: " . $e->getMessage();
  }


function isLoggedIn() {
  if(isset($_SESSION['usuario'])){
    return true;
  }else{
    return false;
  }
}