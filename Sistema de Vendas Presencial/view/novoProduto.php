<?php
require_once __DIR__ . '/navbar.php';
?>

<form action="" method="post">
    <div class="product-introduction">
        <label for="imagem-produto">Imagem do Produto
            <input type="file" name="prodPicture" id="imagem-produto">
        </label>

        <div class="titles-prod-introdcution">
            <label for="titulo-prod">
                <input type="text" placeholder="Nome do Produto" name="titulo-prod" id="titulo-prod">
            </label>
            <label for="titulo-prod">
                <input type="text" placeholder="Nome do Produto" name="titulo-prod" id="titulo-prod">
            </label>
        </div>
    </div>
</form>