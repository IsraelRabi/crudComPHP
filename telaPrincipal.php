<!DOCTYPE html>
<html lang="pt-br">
<?php
    require_once "phpAction/dbConnect.php";
    session_start();
    if(!isset($_SESSION['logado'])){
        header("Location: index.php");
    }else {
        $id = $_SESSION["id"];
        $sql = "SELECT * FROM usuarios WHERE id = '$id'";
        $dados = mysqli_fetch_array(mysqli_query($connect, $sql));

    }
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo <?php echo $dados['nome'];?></title>
    <link rel="stylesheet" href="css/telaPrincipal.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <div style="display:none;" class="tem-certeza">
        <p>Tem certeza que deseja deletar?</p>
        <div class="certeza-opt">
            <div class="certeza-opt-sim">
                <form class="form-deletar" action="phpAction/delete.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo "lkjsadlfjsdkl"; ?>">
                    <input type="hidden" name="btn-sim">
                    <div class="certeza-opt-sim">SIM</div>
                </form>
            </div>
            <div class="certeza-opt-nao">NÃO</div>
        </div>
    </div>

    <div style="display:none;" class="editar">
        <div class="form-register">
            <form action="phpAction/update.php" method="POST">
                <input type="text" name="usuario" placeholder="Usuário:" value="<?php echo $dados['usuario'];?>" required>
                <input type="text" name="nome" placeholder="Nome:" value="<?php echo $dados['nome'];?>" required>
                <input type="email" name="email" placeholder="Email:" value="<?php echo $dados['email'];?>" required>
                <button type="submit" name="btn-alterar">Alterar</button>
            </form>
        </div>
        <div class="btn-voltar">Voltar</div>
    </div>

    <div class="container">
        <div class="bem-vindo">
            <h1>Seja bem-vindo</h1>
            <p><?php echo $dados['nome']; ?></p>
        </div>
        <div class="infos">
            <p>Usuário: <?php echo $dados['usuario']; ?></p>
            <p>Email: <?php echo $dados['email']; ?></p>
        </div>
        <div class="btns">
            <div class="btn-sair">Sair</div>
            <div class="btn-editar">Editar</div>
            <div class="btn-deletar">Deletar</div>
        </div>
    </div>

    <script>
        const btnSair = document.querySelector(".btn-sair")
        const btnEditar = document.querySelector(".btn-editar")
        const btnDeletar = document.querySelector(".btn-deletar")

        const editar = document.querySelector(".editar")
        const voltar = document.querySelector(".btn-voltar")

        const formDeletar = document.querySelector(".form-deletar")
        const delSim = document.querySelector(".certeza-opt-sim")
        const delNao = document.querySelector(".certeza-opt-nao")
        const container = document.querySelector(".container")
        const temCerteza = document.querySelector(".tem-certeza")

        btnSair.addEventListener("click", () => location.href = "phpAction/logout.php")
        btnEditar.addEventListener("click", () => {
            editar.style.display = "block";
            container.style.display = "none";
        })
        btnDeletar.addEventListener("click", () => {
            container.style.display = "none";
            temCerteza.style.display = "block";
        })

        voltar.addEventListener("click", () => {
            editar.style.display = "none"
            container.style.display = "block";
        })

        delSim.addEventListener("click", () => {
            formDeletar.submit()
        })
        delNao.addEventListener("click", () => {
            temCerteza.style.display = "none";
            container.style.display = "block";
        })
    </script>
</body>

</html>