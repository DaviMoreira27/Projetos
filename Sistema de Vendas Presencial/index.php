<?php
require_once __DIR__ . "/autoload.php";
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php require_once "config.php"; ?>
    <link rel="stylesheet" href="view/css/index.css">
    <title>Rendas Mensais</title>
</head>

<body>
    <h1 id="tituloLogin">Login Administração</h1>

    <form action="controller/validaLogin.php" method="post"
          id="formLogin">
        <label for="input-email">Email<br>
            <input type="text" required name="email"
                   placeholder="Email"
                   id="input-email">
        </label><br>

        <label for="input-senha">Senha<br>
            <input type="password" required name="senha"
                   placeholder="Digite a senha"
                   id="input-senha">
        </label><br>

        <input type="submit" value="Entrar">
    </form>
</body>
</html>

<?php

if (isset($_POST['msg'])) {
    require_once 'msg.php';
    $msg = $_POST["msg"];
    $msgExibir = $MSG[$msg];
    echo "<script>alert('" . $msgExibir . "');</script>";
}

