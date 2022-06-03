<?php




class Funcionario{
    public $idFuncionario;
    public $nome;
    public $CPF;
    public $dataNasc;
    public $status;
    public $areaJob;

    //Getters

    public function getIdFuncionario(){
        return $this->idFuncionario;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getCPF(){
        return $this->CPF;
    }

    public function getDataNasc()
    {
        return $this->dataNasc;
    }

    public function getStatus(){
        return $this->status;
    }

    public function getAreaJob(){
        return $this->areaJob;
    }

    //Setters

    public function setIdFuncionario($idFuncionario){
        $this->idFuncionario =  $idFuncionario;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function setCPF($CPF){
        $this->CPF = $CPF;
    }
    public function setDataNasc($dataNasc){
        $this->dataNasc = $dataNasc;
    }
    public function setStatus($status){
        $this->status = $status;
    }
    public function setAreaJob($areaJob){
        $this->areaJob = $areaJob;
    }


}