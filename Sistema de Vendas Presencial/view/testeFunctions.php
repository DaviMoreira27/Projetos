<?php
require_once "../model/Produto.class.php";

$produto = new Produto();

// print_r($produto->testImagePath('omo.png'));
$dados = [1,1,2,3,56];

// var_dump($dados);

var_dump($produto->issetProdutoDados($dados));

echo"<br>";

var_dump($produto->testImagePath('C:\xampp\htdocs\Estudos\Projetos\Sistema de Vendas Presencial\resources\img\omo.gif'));