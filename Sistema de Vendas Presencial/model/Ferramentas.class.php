<?php

class Ferramentas{

	public function hash256($string){
		// devolve 64 caracteres
		return hash('sha256', $string);
	}

    public function antiInjection($param){
        // verifica se informações de formulário possui injection
        $strParam = strlen($param);
        $palavras = array("from","select","insert","delete","where","drop","table","show","update","declare","exec","set","alter","cst","union","column","*","%","\"","'","\\","--");
        $palavras2 = array("FROM","SELECT","INSERT","DELETE","WHERE","DROP","TABLE","SHOW","UPDATE","DECLARE","EXEC","SET","ALTER","CST","UNION","COLUMN","*","%","\"","'","\\","--");
        $paramL = strtolower($param);
        $paramU = strtoupper($param);
        $str = str_replace($palavras,"",$paramL);
        $strParams = strlen($str);
        if($strParam !== $strParams){
            return false;
        }

        $str = str_replace($palavras2,"",$paramU);
        $strParams = strlen($str);
        return $strParam === $strParams; // dados válidos
    }
}


