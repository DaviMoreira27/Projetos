<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inserir Funcionario</title>
    <link rel="stylesheet" href="Styles/registerForm.css">
</head>
<body>
    <form action="../Classes/Conexao.php" enctype="multipart/form-data" method="post">
        <label for="nome">Nome</label><br>
        <input type="text" placeholder="Nome do Funcionario" name="nome"><br>

        <label for="dataNasc">Data de Nascimento</label><br>
        <input type="date" placeholder="Data de Nascimento" name="dataNasc"><br>

        <label for="CPF">CPF</label><br>
        <input type="text" maxlength="11" pattern="[0-9]{11}" placeholder="CPF" name="CPF"><br>
    <div class="selects">

        <label for="file">Faça o upload da Imagem
        <input type="file" formenctype="multipart/form-data"
               accept="image/*" id="file" name="file"><br>
        </label>

        <select name="status" id="status">
            <option value="0" selected>Status</option>
            <option>Atestado</option>
            <option>Ferias</option>
            <option>Ativo</option>
            <option>Afastado</option>
            <option>Demitido</option>
        </select>

        <select name="areaJob" id="areaJob">
            <option value="0" selected>Area de Trabalho</option>
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
        <input type="submit" value="Enviar" name="Enviar" id="btn-submit">
    </form>

<button><a href="../Index.php">Voltar</a></button>
</body>
</html>