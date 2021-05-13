<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD com PHP</title>
    <link rel="stylesheet" href="css/main.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="option">
            <div class="login-option login">Login</div>
            <div class="register-option">Register</div>
        </div>

        <div class="forms">
            <div class="form-login">
                <form action="phpAction/login.php" method="POST">
                    <input type="text" name="user" placeholder="User/Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit" name="btn-login">Login</button>
                </form>
            </div>

            <div class="form-register" style="display: none;">
                <form action="phpAction/create.php" method="POST">
                    <input type="text" name="user" placeholder="User" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit" name="btn-register">Register</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        const optLogin = document.querySelector(".login-option")
        const optRegister = document.querySelector(".register-option")
        const formLogin = document.querySelector(".form-login")
        const formRegister = document.querySelector(".form-register")

        optLogin.addEventListener("click", () => {
            optLogin.classList.add("login");
            optRegister.classList.remove("register");
            formLogin.style.display = "block";
            formRegister.style.display = "none";
        });
        optRegister.addEventListener("click", () => {
            optRegister.classList.add("register");
            optLogin.classList.remove("login");
            formRegister.style.display = "block";
            formLogin.style.display = "none";
        });
    </script>
</body>

</html>