<?php

class Login{


    public function issetLogin($email, $senha): bool{
        return isset($email, $senha) && !empty($email) && !empty($senha);
    }

    public function validaEmail($email){
        return filter_var($email,
             FILTER_VALIDATE_EMAIL);
    }

    public function confereErrosEmail($email){
        return $email === filter_var($email,
            FILTER_SANITIZE_EMAIL);
    }

    public function criptografiaSenha($senha){
        require_once __DIR__ . '/Ferramentas.class.php';
        return (new Ferramentas())->hash256($senha);
    }

    public function checkAntiInjection($senha){
        require_once __DIR__ . '/Ferramentas.class.php';
        $ferramentas = new Ferramentas();

        $checkAnti = $ferramentas->antiInjection($senha);
        return $checkAnti !== false;
    }
}
