<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo <?php echo "opa"; ?></title>
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
                    <div class="certeza-opt-sim">SIM</div>
                </form>
            </div>
            <div class="certeza-opt-nao">NÃO</div>
        </div>
    </div>

    <div class="editar">
        <div class="form-register">
            <form action="phpAction/update.php" method="POST">
                <input type="text" name="usuario" placeholder="Usuário:" value="<?php echo "teste";?>" required>
                <input type="text" name="nome" placeholder="Nome:" required>
                <input type="email" name="email" placeholder="Email:" required>
                <button type="submit" name="btn-alterar">Alterar</button>
            </form>
        </div>
        <div class="btn-voltar">Voltar</div>
    </div>

    <div style="display:none;" class="container">
        <div class="bem-vindo">
            <h1>Seja bem-vindo</h1>
            <p><?php echo "opa"; ?></p>
        </div>
        <div class="infos">
            <p>Usuário: <?php echo "opazinho"; ?></p>
            <p>Email: <?php echo "opa@gmail.com"; ?></p>
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

        btnSair.addEventListener("click", () => location.href = "phpAction/sair.php")
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