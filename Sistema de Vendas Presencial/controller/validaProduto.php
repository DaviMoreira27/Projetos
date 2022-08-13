<?PHP

require_once __DIR__ . "/../model/Produto.class.php";

$produto = new Produto();

if (isset($_POST['addProd'])) : //Adicionar Produto

    $dados = [];

    $dados["nomeProduto"] = $_REQUEST["nomeProduto"];
    $dados["precoProduto"] = $_REQUEST["precoProduto"];
    $dados["dataC"] = date('Y-m-d h:i:s');
    $dados["marcaProduto"] = $_REQUEST["marcaProduto"];
    $dados["codigoBarras"] = $_REQUEST["codigoBarras"];
    $dados["modeloProduto"] = $_REQUEST["modeloProduto"];
    $dados["quantidadeProd"] = $_REQUEST["quantidadeProd"];
    $dados["idCategoria"] = $_REQUEST["idCategoria"];
    $dados["img_link"] = $_REQUEST["img_link"];

    if ($produto->issetProdutoDados($dados) != true) {
        if ($produto->testImagePath($dados['img_link'])) {

            require_once "../model/Manager.class.php";
            $manager = new Manager();
            $manager->insertCliente('tbl_produto', $dados);

?>
            <form action="../view/listaprodutos.php" name="myForm" id="myForm" method="post">
                <input type="hidden" name="msg" value="OP50">
            </form>
            <script>
                document.getElementById('myForm').submit();
            </script>

        <?php

        } else {

        ?>
            <form action="../view/novoProduto.php" name="myForm" id="myForm" method="post">
                <input type="hidden" name="msg" value="OP50">
            </form>
            <script>
                document.getElementById('myForm').submit();
            </script>

        <?php
        }
    } else {
        ?>
        <form action="../view/novoProduto.php" name="myForm" id="myForm" method="post">
            <input type="hidden" name="msg" value="OP50">
        </form>
        <script>
            document.getElementById('myForm').submit();
        </script>

<?php
    }

endif;
