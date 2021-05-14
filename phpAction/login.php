<?php
require_once "dbConnect.php";

if(isset($_POST["btn-login"])) {
    $usuario = clearInput($connect, $_POST["usuario"]);
    $senha = clearInput($connect, $_POST["senha"]);

    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' OR email = '$usuario'";
    $resultado = mysqli_query($connect, $sql);
    $dados = mysqli_fetch_array($resultado);
    mysqli_close();

    if(mysqli_num_rows($resultado) == 1) {
        if(password_verify($senha ,$dados["senha"])){
            session_start();
            $_SESSION['logado'] = true;
            $_SESSION['id'] = $dados['id'];
            header("Location: ../telaPrincipal.php");
        }else {
            session_start();
            $_SESSION['mensagem'] = "Senha errada";
            header("Location: ../");
        }

    }else {
        session_start();
        $_SESSION['mensagem'] = "Usuário/Email não cadastrado";
        header("Location: ../");
    }

    



}else {
    header("Location: ../");
}