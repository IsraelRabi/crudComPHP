<?php

require_once "dbConnect.php";

if(isset($_POST["btn-alterar"])) {
    $id = clearInput($connect, $_POST["id"]);
    $usuario = clearInput($connect, $_POST["usuario"]);
    $nome = clearInput($connect, $_POST["nome"]);
    $email = clearInput($connect, $_POST["email"]);

    
    $sql = "UPDATE usuarios SET usuario = '$usuario', nome = '$nome', email = '$email' WHERE id = '$id'";
    
    if(mysqli_query($connect, $sql)) {
        mysqli_close();
        session_start();
        $_SESSION['mensagem'] = "Alterado com sucesso";
        header("Location: ../telaPrincipal.php");
    }else {
        mysqli_close();
        session_start();
        $_SESSION['mensagem'] = "Falha ao alterar";
        header("Location: ../telaPrincipal.php");
    }

}else {
    header("Location: ../");
}