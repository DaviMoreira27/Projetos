<?php
session_start();
if (isset($_SESSION['ADM_ID'])){

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php require_once "../config.php"; ?>
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="view/css/navbar.css">
</head>

<body>
    <?php
        if ($_SESSION['ADM_PODER'] >= 10){
            require_once __DIR__. "/navbarSessions/sysopNavbar.php";
        }else if ($_SESSION['ADM_PODER'] >= 9){
            require_once __DIR__. "/navbarSessions/gerenteNavbar.php";
        }else if($_SESSION['ADM_PODER'] = 8){
            require_once __DIR__. "/navbarSessions/vendedorNavbar.php";
        }

    ?>
</body>
</html>

<?php

}else{
    ?>
    <form action="../index.php" name="myForm" id="myForm"
          method="post">
        <input type="hidden" name="result"
               value="erro-sessao">
    </form>
    <script>
        document.getElementById("myForm").submit();
    </script>
    <?php
}