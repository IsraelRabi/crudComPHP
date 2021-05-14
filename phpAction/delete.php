<?php
require_once "dbConnect.php";

if(isset($_POST['btn-sim'])){
    session_start();
    $id = $_SESSION['id'];

    $sql = "DELETE FROM usuarios WHERE id = '$id'";

    if(mysqli_query($connect, $sql)){
        mysqli_close();
        session_start();
        session_unset();
        session_destroy();
        header("Location: ../");
    }else {
        mysqli_close();
        session_start();
        $_SESSION['mensagem'] = 'Falha ao deletar';
        header("Location: ../telaPrincipal.php");
    }

}else {
    header("Location: ../");
}