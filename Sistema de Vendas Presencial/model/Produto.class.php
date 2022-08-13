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

}

// String to HEX
// bin2hex("that's all you need");

// HEX to String
// hex2bin('74686174277320616c6c20796f75206e656564');

// INSERT INTO MENU (NOME, urlMenu, dataC, statusM)
//  VALUES (UNHEX('42415441544141'), UNHEX('424154415441412f322f32'), now(), UNHEX('31'));