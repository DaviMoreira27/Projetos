<?php

class Produto{

    public function issetProdutoDados($dados){
        if(array_search('', $dados)){
            return true;
        }else{
            return false;
        }
    }

    public function testImagePath($path){

        $supported_image = array('jpg','jpeg','png', 'pdf');

        $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION)); // Using strtolower to overcome case sensitive
        if (in_array($ext, $supported_image)) {
            return true;
        } else {
            return false;
        }
    }

    public function imageUpload($imagemPostKey){

        $ext = strtolower(substr($_FILES[$imagemPostKey]['name'], -4));
        $random = rand(0, 10000);

        //Definindo um novo nome para o arquivo
        $new_name = $random . $_FILES[$imagemPostKey]['name'];
        //Diretório para uploads
        $dir = '../resources/img/';

        move_uploaded_file($_FILES[$imagemPostKey]['tmp_name'], $dir . $new_name);

        return $dir . $new_name;

    }

}

// String to HEX
// bin2hex("that's all you need");

// HEX to String
// hex2bin('74686174277320616c6c20796f75206e656564');

// INSERT INTO MENU (NOME, urlMenu, dataC, statusM)
//  VALUES (UNHEX('42415441544141'), UNHEX('424154415441412f322f32'), now(), UNHEX('31'));