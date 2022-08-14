<?php
require_once __DIR__ . "/navbar.php";
require_once __DIR__ .  "/../model/Manager.class.php";
$manager = new Manager();
$resultBD = $manager->listClient('tbl_produto');

?>

<?php
if (isset($_SESSION['ADM_ID'])) {

?>
    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <?php require_once "../config.php"; ?>
        <link rel="stylesheet" href="css/navbar.css">
        <link rel="stylesheet" href="view/css/navbar.css">
        <link rel="stylesheet" href="css/listaProdutos.css">
        <script src="./js/listaProdutos.js" defer></script>
    </head>

    <body id="mainContent">

        <main class="divMain">
            <article class="center filters-prod">
                <h1>Produtos</h1>
                <section class="search-bar">
                    <input type="search" placeholder="Pesquisar" name="search" id="search-input">

                    <section class="filters-select">
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
            </article>


            <article class="lista-produtos">
                <table class="tabela-produto">
                    <tr id="label-table">
                        <td>Foto</td>
                        <td>Nome</td>
                        <td>Marca</td>
                        <td>Quantidade</td>
                        <td>Preço R$</td>
                        <td>Categoria</td>
                        <td>Ações</td>
                    </tr>
                    <!-- For -->
                    <?php
                    if (count($resultBD) > 0) :
                        for ($i = 0; $i < count($resultBD); $i++) :
                    ?>
                            <a href="#">
                                <tr id="values">
                                    <td>
                                        <img src="<?= $resultBD[$i]['img_link'] ?>" alt="<?= $resultBD[$i]['nomeProduto'] ?>">
                                    </td>
                                    <td><?= $resultBD[$i]['nomeProduto'] ?></td>
                                    <td><?= $resultBD[$i]['marcaProduto'] ?></td>
                                    <td><?= $resultBD[$i]['quantidadeProd'] ?></td>
                                    <td><?= $resultBD[$i]['precoProduto'] ?></td>
                                    <td><?= $resultBD[$i]['idCategoria'] ?></td>
                                    <td>
                                        <button id="btn-prod-edit">
                                            <i class="fa-solid fa-pen fa-2x"></i>
                                        </button>
                                        <button id="btn-prod-delete">
                                            <i class="fa-solid fa-trash fa-2x"></i>
                                        </button>
                                    </td>
                                </tr>
                            </a>

                    <?php
                        endfor;
                    else :
                        echo "<td>Nenhum registro encontrado</td>";
                    endif;
                    ?>
                </table>
            </article>

        </main>

    </body>

    </html>

<?php

    if (isset($_POST['msg'])) {
        require_once 'msg.php';
        $msg = $_POST["msg"];
        $msgExibir = $MSG[$msg];
        echo "<script>alert('" . $msgExibir . "');</script>";
    }
}
