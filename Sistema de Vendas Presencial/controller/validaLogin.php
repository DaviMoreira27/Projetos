<?php

require_once __DIR__ . "/../model/Login.class.php";

$login = new Login();

if (
    $login->issetLogin($_POST['email'], $_POST['senha'])
    && $login->validaEmail($_POST['email'])
    && $login->confereErrosEmail($_POST['email']) !== false
    && $login->checkAntiInjection($_POST['senha'])
) {
    session_start();

    //    EXITO - Ir para a pagina administrativa

    require_once "../model/Manager.class.php";
    $manager = new Manager();
    $senhaCripto = $login->criptografiaSenha($_POST['senha']);
    $arrayParams = ['email', 'senha'];
    $arrayParamsPost = [$_POST['email'], $senhaCripto];

    $pg = $manager->selectWhere(
        2,
        $arrayParams,
        $arrayParamsPost,
        'login'
    );
    if ($pg) {
        for ($i = 0, $iMax = count($pg); $i < $iMax; $i++) {
            $_SESSION['ADM_ID'] = $pg[0]['idLogin'];
            $_SESSION['ADM_NOME'] = $pg[0]['NOME'];
            $_SESSION['ADM_EMAIL'] = $pg[0]['EMAIL'];
            $_SESSION['ADM_PODER'] = $pg[0]['PODER'];
            $_SESSION['ADM_SENHA'] = $pg[0]['SENHA'];
        }
?>
        <form action="../view/listaprodutos.php" name="myForm" id="myForm" method="post">
            <input type="hidden" name="result" value="OA50">
        </form>
        <script>
            document.getElementById("myForm").submit();
        </script>
    <?php
    } else {
        session_destroy();
        //  ERROR - Voltar ao index.

    ?>
        <form action="../index.php" name="myForm" id="myForm" method="post">
            <input type="hidden" name="result" value="OA02">
        </form>
        <script>
            document.getElementById("myForm").submit();
        </script>
    <?php
    }
} else {
    session_destroy();
    //  ERROR - Voltar ao index.

    ?>
    <form action="../index.php" name="myForm" id="myForm" method="post">
        <input type="hidden" name="result" value="FR24">
    </form>
    <script>
        document.getElementById("myForm").submit();
    </script>
<?php
}
