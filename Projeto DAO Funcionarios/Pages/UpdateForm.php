<?php
require_once "../Classes/Conexao.php";

$id = $_GET['u'];

$func = new FuncionarioDAO();
$tb = $func->selectID($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inserir Funcionario</title>
    <link rel="stylesheet" href="Styles/registerForm.css">
</head>
<body>
<form action="../Classes/Conexao.php" method="post">

    <input type="hidden" value="<?=$tb[0]['idFuncionario']?>" name="idFuncionario">

    <label for="nome">Nome</label><br>
    <input type="text" placeholder="Nome do Funcionario" value="<?=$tb[0]['nome']?>" name="nome"><br>

    <label for="dataNasc">Data de Nascimento</label><br>
    <input type="date" placeholder="Data de Nascimento"
           value="<?=$tb[0]['dataNasc']?>" name="dataNasc"><br>

    <label for="CPF">CPF</label><br>
    <input type="text" maxlength="11" value="<?=$tb[0]['CPF']?>"
           pattern="[0-9]{11}" placeholder="CPF" name="CPF"><br>

    <div class="selects">

        <label for="file">Faça o upload da Imagem
            <input type="file" formenctype="multipart/form-data"
                   accept="image/*" value="<?=$tb[0]['img_link']?>" id="file" name="file"><br>
        </label>


        <select name="status"  required id="status">
            <option value="<?=$tb[0]['status']?>" selected><?=$tb[0]['status']?></option>
            <option>Atestado</option>
            <option>Ferias</option>
            <option>Ativo</option>
            <option>Afastado</option>
            <option>Demitido</option>
        </select>

        <select name="areaJob" required id="areaJob">
            <option value="<?=$tb[0]['areaJob']?>" selected><?=$tb[0]['areaJob']?></option>
            <option>TI</option>
            <option>Recursos Humanos</option>
            <option>Administração</option>
            <option>Limpeza</option>
            <option>Setor Operacional</option>
            <option>Financeiro</option>
            <option>Marketing</option>
            <option>Juridico</option>
        </select>

    </div>
    <input type="submit" value="Enviar" name="submit" id="btn-submit">
</form>

<button><a href="../Index.php">Voltar</a></button>
</body>
</html>