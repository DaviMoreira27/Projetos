<?php

require_once __DIR__ . "\..\autoload.php";

class funcionarioDao
{


    //SELECT DE FUNCIONARIOS POR ID

    public function selectID($id)
    {
        $connect = new Conexao();
        $funcBean = new funcionarioBean();
        $connect = Conexao::$conn;

        $sql = "SELECT * FROM vendaspresenciais.tbl_funcionario WHERE idFuncionario = :id";

        $result = $connect->prepare($sql);
        $result->bindParam(":id", $id);
        $result->execute();

        return $result->fetchAll();
    }

    //SELECT DE FUNCIONARIOS

    public function select(){
        $connect = new Conexao();
        $funcBean = new funcionarioBean();
        $connect = Conexao::$conn;
        $tabela = [];

        $sql = "SELECT * FROM vendaspresenciais.tbl_funcionario";

        $result = $connect->prepare($sql);
        $result->execute();


        while ($linha = $result->fetch()){
            $tabela[] = $linha;
        }

        return $tabela;
    }

    //TRATAMENTO DE IMAGEM

    public function imageCheck(){

        $handle = opendir("../Resources/Imagens");
        $countDIR =  array_count_values((array)readdir($handle));
        $ext = strtolower(substr($_FILES['file']['name'],-4)); //Pegando extensão do arquivo
        for ($i = 0; $i < $countDIR; $i++) {
            if ($i = $countDIR){
                break;
            }
            global $i;
             echo $i;

        }

        $new_name = $_FILES['file']['name']. '21'. $i. $ext ; //Definindo um novo nome para o arquivo
        $dir = '../Resources/Imagens'; //Diretório para uploads
        move_uploaded_file($_FILES['file']['tmp_name'], $dir.$new_name);

        $connect = new Conexao();
        return $connect->file = $dir .$new_name;
    }

    //INSERT DE FUNCIONARIOS

    public function insert(){

        $connect = new Conexao();
        $funcBean = new funcionarioBean();
        $connect = Conexao::$conn;


        $img_link = $this->imageCheck();
        $img = explode('../',$img_link);


        $funcBean->setNomeFuncionario($_POST['nomeFuncionario']);
        $funcBean->setNomeFuncionario($_POST['dataNasc']);
        $funcBean->setNomeFuncionario($img[1]);

        $dateTrans = str_replace('/','-', $funcBean->getDataNasc());
        $format = strtotime($dateTrans);
        $newDate = date("Y/m/d", $format);

        $sql = "INSERT INTO vendaspresenciais.tbl_funcionario
                (nomeFuncionario, dataNasc, img_link)
                VALUES (:nomeFuncionario, :dataNasc,:img_link)";

        $result = $connect->prepare($sql);
        $result->bindValue(':nomeFuncionario', $funcBean->getNomeFuncionario());
        $result->bindValue(':dataNasc', $newDate);
        $result->bindValue(':img_link', $funcBean->getImgLink());

        $result->execute();

    }

}

