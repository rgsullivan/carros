<?php
//conexão com o banco de dados

$servername = "localhost";
$username = "root";
$password ="rodrigosll7";
$db_name = "cars";

$connect = mysqli_connect ($servername, $username, $password, $db_name);

mysqli_set_charset($connect, "utf8");

if (mysqli_connect_error()):
  echo "Erro de conexão: ".mysqli_connect_error();

endif;
?>