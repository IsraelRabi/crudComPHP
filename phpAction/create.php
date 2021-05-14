<?php
require_once "dbConnect.php";

if(isset($_POST["btn-registrar"])) {
    $usuario = clearInput($connect, $_POST["usuario"]);
    $nome = clearInput($connect, $_POST["nome"]);
    $email = clearInput($connect, $_POST["email"]);
    $senha = password_hash(clearInput($connect, $_POST["senha"]), PASSWORD_DEFAULT);

    
    $sql = "SELECT usuario FROM usuarios WHERE usuario = '$usuario' OR email = '$email'";
    $resultado = mysqli_query($connect, $sql);
    mysqli_close();

    if(mysqli_num_rows($resultado) >= 1) {
        session_start();
        $_SESSION['mensagem'] = "<p>Usuário já registrado</p>";
        header("Location: ../");
    }else {
        $sql = "INSERT INTO usuarios (usuario, nome, email, senha) VALUES ('$usuario', '$nome', '$email', '$senha')";
        $resultado = mysqli_query($connect, $sql);
        mysqli_close();
        session_start();
        $_SESSION['mensagem'] = "<p>Usuário registrado com sucesso</p>";
        header("Location: ../");
    }

}else {
    header("Location: ../");
}