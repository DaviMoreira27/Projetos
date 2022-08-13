<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once "../config.php"; ?>
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../view/css/navbar.css">
</head>

<body>
    <header class="header">
        <h1><span id="span-header">e</span>Facil</h1>
        <nav class="navBar">
            <a id="newBuy" href="#"><button class="botaoCompra">Nova Compra<i class="fa-solid fa-plus"></i></button></a>
            <ul id="menu-list">
                <a href="listaProdutos.php">
                    <li>Produtos <i class="fa-solid fa-bag-shopping"></i></li>
                </a>
                <a href="novoProduto.php">
                    <li>Novo Produto <i class="fa-solid fa-plus"></i></li>
                </a>
            </ul>
        </nav>
    </header>
</body>

</html>