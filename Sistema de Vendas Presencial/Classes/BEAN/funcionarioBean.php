<?php


class funcionarioBean{
    private $idFuncionario;
    private $nomeFuncionario;
    private $dataNasc;
    private $img_link;


    public function getIdFuncionario()
    {
        return $this->idFuncionario;
    }

    public function setIdFuncionario($idFuncionario): void
    {
        $this->idFuncionario = $idFuncionario;
    }

    public function getNomeFuncionario()
    {
        return $this->nomeFuncionario;
    }


    public function setNomeFuncionario($nomeFuncionario): void
    {
        $this->nomeFuncionario = $nomeFuncionario;
    }


    public function getDataNasc()
    {
        return $this->dataNasc;
    }


    public function setDataNasc($dataNasc): void
    {
        $this->dataNasc = $dataNasc;
    }


    public function getImgLink()
    {
        return $this->img_link;
    }


    public function setImgLink($img_link): void
    {
        $this->img_link = $img_link;
    }



}