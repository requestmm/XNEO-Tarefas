<?php
unset($_SESSION['usuario']);
session_destroy();

header( "refresh:5;URL=/" );
echo "Você saiu. Redirecionando..";


?>