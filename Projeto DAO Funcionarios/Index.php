<?php
require_once "Classes/Conexao.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Funcionarios na Empresa</title>
    <link rel="stylesheet" href="Pages/Styles/index.css">
</head>
<body>

<button type="button" name="link"><a href="Pages/RegisterForm.php">Adicionar</a></button>
<table>
    <tr>
        <th>ID Funcionario</th>
        <th>Nome</th>
        <th>Data Nascimento</th>
        <th>CPF</th>
        <th>Status</th>
        <th>Area de Trabalho</th>
        <th id="act">Ações</th>
    </tr>
    <?php
    $func = new FuncionarioDAO();
    $tb = $func->select();

    for ($x = 0, $xMax = count($tb); $x < $xMax; $x++){
    ?>
    <tr>

        <td><img style="width: 100px; height: 80px" id="imgtd" src="<?=$tb[$x]["img_link"]?>"></td>
        <td><?=$tb[$x]["idFuncionario"]?></td>
        <td><?=$tb[$x]["nome"]?></td>
        <td><?php
            $date = str_replace('-', '/', $tb[$x]["dataNasc"]);
            $exDate = strtotime($date);
            $newDate = date("d/m/Y", $exDate);
            echo $newDate;
            ?>
        </td>
        <td><?=$tb[$x]["CPF"]?></td>
        <td><?=$tb[$x]["status"]?></td>
        <td><?=$tb[$x]["areaJob"]?></td>
        <td>
            <a href="Classes/Conexao.php?q=<?=$tb[$x]["idFuncionario"]?>">Deletar</a>
            <a href="Pages/UpdateForm.php?u=<?=$tb[$x]["idFuncionario"]?>">Alterar</a>
        </td>
    </tr>
    <?php } ?>
</table>
</body>
</html>