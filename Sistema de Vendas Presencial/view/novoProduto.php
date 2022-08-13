<?php
require_once __DIR__ . '/navbar.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require_once "../config.php"; ?>
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="view/css/navbar.css">
    <link rel="stylesheet" href="css/novoProduto.css">
</head>

<body id="mainContent">
    <main class="divMain">
        <article class="add-new-produto">
            <h1>Adicionar Produto</h1>

            <form action="#" class="form-add-produto">
                <input type="hidden" name="addProd">

                <label for="nomeProduto">Nome do produto
                    <input type="text" name="nomeProduto" id="nome-input" required>
                </label>

                <div class="row-content-prod">
                    <label for="marcaProduto">Marca do produto
                        <input type="text" name="marcaProduto" id="marca-input" required>
                    </label>
                    <label for="modeloProduto">Modelo do produto
                        <input type="text" name="modeloProduto" id="modelo-input" required>
                    </label>
                </div>

                <div class="row-content-prod">
                    <label for="quantidadeProd">Quantidade
                        <input type="number" min="0" name="quantidadeProd" id="quant-input" required>
                    </label>
                    <label for="precoProduto">Valor de Compra
                        <input type="text" step="0.010" name="precoProduto" id="valor-input" required>
                    </label>
                </div>

                <label for="codigoBarras">Codigo de Barras
                    <input type="number" min="0" name="codigoBarras" id="codigo-input" required>
                </label>

                <select name="nomeCategoria" id="categoria-select">
                    <option>Produtos Higiênicos</option>
                </select>

                <!-- Adicionar arquivo -->

                <div id="yourBtn" style="height: 50px; width: 100%;border: 1px dashed #BBB; cursor:pointer;" onclick="getFile()">Escolha seu arquivo de imagem</div>
                <div style='height: 0px;width:0px; overflow:hidden;'>
                    <input id="upfile" type="file" name="img_link" value="upload" />
                </div>

                <input type="submit" id="submit-input" value="Adicionar">
            </form>
            <button id="voltar-lista">Voltar</button>
        </article>
    </main>
</body>
<script>
    function getFile() {
        document.getElementById("upfile").click();
    }

    function sub(obj) {
        var file = obj.value;
        var fileName = file.split("\\");
        document.getElementById("yourBtn").innerHTML = fileName[fileName.length - 1];
        document.myForm.submit();
        event.preventDefault();
    }
</script>

</html>