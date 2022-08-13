<?php

class Produto{

    public function issetProdutoDados($dados){
        for($i = 0; $i < count($dados); $i++){
            if(isset($dados[$i]) && !empty($dados[$i])){
                return true;
            }else{
                return false;
            }
        }
    }

    public function testImagePath($path){

        if (!preg_match("/\.(png|jpg|jpeg|pdf)$/", $path, $ext)) return 0;
        $ret = null;
        switch ($ext) {
            case 'png':
                $ret = @imagecreatefrompng($path);
                break;
            case 'jpeg':
                $ret = @imagecreatefromjpeg($path);
                break;
                // ...
            default:
                $ret = 0;
        }

        return $ret;
    }

    // public function antiInjectSqlCheck($dados){
    //     if($this->issetProdutoDados($dados) === true){
    //         $dadosHEX = [];
    //         for ($i = 0; $i < count($dados); $i++) {
    //             $dadosHEX[] = bin2hex($dados[$i]); 
    //         }

    //         return $dadosHEX;
    //     }
    // }

}

// String to HEX
// bin2hex("that's all you need");

// HEX to String
// hex2bin('74686174277320616c6c20796f75206e656564');

// INSERT INTO MENU (NOME, urlMenu, dataC, statusM)
//  VALUES (UNHEX('42415441544141'), UNHEX('424154415441412f322f32'), now(), UNHEX('31'));