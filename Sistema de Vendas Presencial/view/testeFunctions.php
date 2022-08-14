<?php
require_once "../model/Produto.class.php";

$produto = new Produto();

// print_r($produto->testImagePath('omo.png'));
// $dados = [1,1,2,3,56];

// var_dump($dados);

// var_dump($produto->issetProdutoDados($dados));

// echo"<br>";

// var_dump($produto->testImagePath('C:\xampp\htdocs\Estudos\Projetos\Sistema de Vendas Presencial\resources\img\omo.gif'));


?>

<form action="./testeFunctions.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="imagem"><br>
    <input type="submit" value="Enviar">
</form>

<?php
// $ext = strtolower(substr($_FILES['imagem']['name'], -4));
// $random = rand(0, 10000);

// $new_name = $random . $_FILES['imagem']['name']; //Definindo um novo nome para o arquivo
// $dir = '../resources/img/'; //Diretório para uploads


// // var_dump(move_uploaded_file($_FILES['imagem']['tmp_name'], $dir . $new_name));
// var_dump($dir . $new_name);


    //  function imageUpload($imagemPostKey){

    //     $ext = strtolower(substr($_FILES[$imagemPostKey]['name'], -4));
    //     $random = rand(0, 10000);

    //     //Definindo um novo nome para o arquivo
    //     $new_name = $random . $_FILES[$imagemPostKey]['name']; 
    //     //Diretório para uploads
    //     $dir = '../resources/img/';

    //     move_uploaded_file($_FILES[$imagemPostKey]['tmp_name'], $dir . $new_name);

    //     return $dir . $new_name;


    // }

    // var_dump(imageUpload('imagem'));