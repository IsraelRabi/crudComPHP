<?php

define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "senha123");
define("DATABASE", "crud");

$connect = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);

function clearInput($connect, $valor) {
    $input = mysqli_escape_string($connect, $valor);
    $input = htmlspecialchars($input);
    // mysqli_close();
    return $input;
}

if(mysqli_connect_error()){
    echo "Erro na conexão: " . mysqli_connect_error();
}