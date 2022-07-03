<?php
require_once __DIR__. "/navbar.php";
require_once __DIR__.  "/../model/Manager.class.php";
$manager = new Manager();
$resultBD = $manager->listClient('tbl_produto');


?>

<?php
if (isset($_SESSION['ADM_ID'])){

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php require_once "../config.php"; ?>
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="view/css/navbar.css">
    <link rel="stylesheet" href="css/listaProdutos.css">
</head>
<body id="mainContent">

    <main class="divMain">
        <article class="center filters-prod">
            <h1>Produtos</h1>
            <section class="search-bar">
                <input type="search"
                       placeholder="Pesquisar"
                       name="search" id="search-input">

                <section class="filters-select">
                    <section class="filters-group1">
                        <label for="filterCategoria">Categorias
                        <select name="categoria" id="filterCategoria">
                            <option value="0">Todos</option>
                            <option value="1">Padaria</option>
                            <option value="2">Cereais e Graãos</option>
                            <option value="3">Congelados e Frios</option>
                            <option value="4">Hortifruti</option>
                            <option value="5">Produtos de Limpeza</option>
                            <option value="6">Higiene Pessoal</option>
                            <option value="7">Bebidas</option>
                        </select>
                    </label>
                        <label for="rangePreco">Faixa de Preço
                            <select name="rangePreco" id="filterCategoria">
                                <option value="0">Todos</option>
                                <option value="0">Padaria</option>
                                <option value="0">Cereais e Graãos</option>
                            </select>
                        </label>
                    </section>
                    <label for="ordingSelect" id="ordernar">Ordernar por:
                        <select name="ordingSelect" id="filterCategoria">
                            <option value="0">Todos</option>
                            <option value="0">Padaria</option>
                            <option value="0">Cereais e Graãos</option>
                            <option value="0">Congelados e Frios</option>
                            <option value="0">Hortifruti</option>
                            <option value="0">Produtos de Limpeza</option>
                            <option value="0">Higiene Pessoal</option>
                            <option value="0">Bebidas</option>
                        </select>
                    </label>
                </section>
            </section>

            <?php for ($i = 0, $iMax = count($resultBD); $i < $iMax; $i++):?>

            <section class="prod-exib">
                <a href="#" id="link-prod" class="<?=$resultBD[$i]['modeloProduto']?>">
                    <div class="produto-container">
                    <img alt="<?=$resultBD[$i]['nomeProduto']?>" width="200px" height="200px" id="produto-imagem"
                         src="../resources/img/omo.jpg">

                    <div class="titles-prod">
                        <h3><?=$resultBD[$i]['nomeProduto']?></h3>
                        <h4><?=$resultBD[$i]['idCategoria']?></h4>
                    </div>

                    <h4><?=$resultBD[$i]['quantidadeProd']?></h4>
                    <h4><?=$resultBD[$i]['precoProduto']?></h4>

                    <div class="actions-prod">
                        <form id="edit-form form-prod">
                            <input type="hidden" name="id" value="<?=$resultBD[$i]['idProduto']?>">
                            <input type="submit" value="Editar">
                        </form>
                        <form id="delet-form form-prod">
                            <input type="hidden" name="id" value="<?=$resultBD[$i]['idProduto']?>">
                            <input type="submit" value="Deletar">
                        </form>
                    </div>
                </div>
                </a>
            </section>

            <?php endfor; ?>
        </article>
    </main>

</body>
</html>

<?php

}


