<?php
require_once  "autoload.php";


$f = new funcionarioDao();

?>

<a href="Pages/AddFuncionario.php">Adicionar Funcionario</a>
<?php


echo "<h1>Select com ID</h1>";


// Select com ID
$SlId =  $f->selectID(2);



for ($x = 0,$count = count($SlId); $x < $count; $x++){
    $dateTrans = str_replace('-','/', $SlId[$x]['dataNasc']);
    $format = strtotime($dateTrans);
    $newDate = date("d/m/Y", $format);



    echo $SlId[$x]['idFuncionario']."-";
    echo $SlId[$x]['nomeFuncionario']."-";
    echo $newDate;
}

echo "<h1>Select sem ID</h1>";

//SELECT

$selectALL = $f->select();


for ($x = 0,$count = count($selectALL); $x < $count; $x++){

    $dateTrans = str_replace('-','/', $selectALL[$x]['dataNasc']);
    $format = strtotime($dateTrans);
    $newDate = date("d/m/Y", $format);

    echo $selectALL[$x]['idFuncionario']."-". $selectALL[$x]['nomeFuncionario']."-".
        $newDate."<br>" ;

}

echo "<hr><br>";

