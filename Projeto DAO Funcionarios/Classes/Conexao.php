<?php



require_once "Funcionario.php";

class Conexao{

    public $file;
    public static $conn;

    public function __construct(){
        try {
            self::$conn = new PDO("mysql:host=localhost;dbname=teste_loja", 'root', '');
        }catch (PDOException $e){
            echo "ERRO: ".  $e->getCode(). "Erro com banco de dados: ". $e->getMessage();
        }catch (Exception $e){
            echo "Erro Generico: ". $e->getMessage();
        }

    }

}


class FuncionarioDAO{


    public function selectID($id){

        $conn = new Conexao();
        $conn = $conn::$conn;

        $tabela = [];

        $sql = "select * from FuncionariosDB.funcionario where idFuncionario = :id";

        $resultado = $conn->prepare($sql);

        $resultado->bindParam(':id' , $id);

        $resultado->execute();
        return $resultado->fetchAll();

    }

    public function select(): array{

        $conn = new Conexao();
        $conn = $conn::$conn;

        $tabela = [];

        $sql = "select * from FuncionariosDB.funcionario";

        $resultado = $conn->query($sql);
        $resultado->execute();
        while ($linha = $resultado->fetch()){
            $tabela[] = $linha;
        }

        return $tabela;
    }

    public function imgUpload(){

            $ext = strtolower(substr($_FILES['file']['name'],-4)); //Pegando extensão do arquivo
            $x = 0;
            $new_name = $_FILES['file']['name']. '21'. ++$x. $ext ; //Definindo um novo nome para o arquivo
            $dir = '../imagens/'; //Diretório para uploads

            move_uploaded_file($_FILES['file']['tmp_name'], $dir.$new_name);

            $connect = new Conexao();

            return $connect->file = $dir .$new_name;

    }

    public function insert(): void
    {

        $sql = "INSERT INTO funcionariosdb.funcionario
         (nome, dataNasc, CPF, status, areaJob, img_link)
        VALUES (:nome,:dataNasc,:CPF,:status,:areaJob, :img_link)";

        $conn = new Conexao();
        $file = new Conexao();
        $conn = $conn::$conn;

        $res = $conn->prepare($sql);

        $img_link = $this->imgUpload();

        $img = explode('../',$img_link);

        $nome = $_POST['nome'];
        $dataNasc = $_POST['dataNasc'];
        $CPF = $_POST['CPF'];
        $status = $_POST['status'];
        $areaJob = $_POST['areaJob'];

        //Convertando a Data
        $date = str_replace('/', '-', $dataNasc);
        $exDate = strtotime($date);
        $newDate = date("Y/m/d", $exDate);

        $res->bindValue(":img_link", $img[1]);
        $res->bindValue(":nome", $nome);
        $res->bindValue(":dataNasc", $newDate);
        $res->bindValue(":CPF", $CPF);
        $res->bindValue(":status", $status);
        $res->bindValue(":areaJob", $areaJob);

        $res->execute();
    }

    public function delete($id){

        $sql = "DELETE FROM funcionariosdb.funcionario WHERE idFuncionario = :id";

        $conn = new Conexao();
        $conn = $conn::$conn;

        $exec = $conn->prepare($sql);
        $exec->execute(array(
            ':id' => $id
        ));
    }

    public function update($id){

    $sql = "UPDATE funcionariosdb.funcionario
        SET nome = :nome , dataNasc = :dataNasc,
            CPF = :CPF, status = :status, areaJob = :areaJob, img_link = :img_link
            WHERE idFuncionario = :id";

        $nome = $_POST['nome'];
        $dataNasc = $_POST['dataNasc'];
        $CPF = $_POST['CPF'];
        $status = $_POST['status'];
        $areaJob = $_POST['areaJob'];

        //Convertando a Data
        $date = str_replace('/', '-', $dataNasc);
        $exDate = strtotime($date);
        $newDate = date("Y/m/d", $exDate);


        $conn = new Conexao();
        $conn = $conn::$conn;

        $exec = $conn->prepare($sql);

        $img_link = $this->imgUpload();

        $img = explode('../',$img_link);


        $exec->bindValue(":idFuncionario", $id);
        $exec->bindValue(":img_link", $img[1]);
        $exec->bindValue(":nome", $nome);
        $exec->bindValue(":dataNasc", $newDate);
        $exec->bindValue(":CPF", $CPF);
        $exec->bindValue(":status", $status);
        $exec->bindValue(":areaJob", $areaJob);

        $exec->execute(array(
            ':id' => $id,
            ':nome' => $nome,
            ':dataNasc' => $dataNasc,
            ':CPF' => $CPF,
            ':status' => $status,
            ':areaJob' => $areaJob,
            ':img_link' => $img[1]
        ));
    }
}



$funcDAO = new FuncionarioDAO();

if (isset($_POST['Enviar'])){
    $funcDAO->insert();
    header("Location: ../index.php");
}

if (isset($_GET["q"])) {
    $funcDAO->delete($_GET["q"]);
    header("Location: ../index.php");
}

if (isset($_POST['submit'], $_POST['idFuncionario'])) {
    $funcDAO->update($_POST['idFuncionario']);
    header("Location: ../index.php");

}