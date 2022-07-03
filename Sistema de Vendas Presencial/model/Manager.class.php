<?php

require_once __DIR__. "/conexao.class.php";


class Manager extends Conexao{

    public function insertCliente($table, $data){
        $pdo = self::getInstance();
        $fields = implode(", ", array_keys($data));
        $values = ":". implode(", :", array_keys($data));
        $sql = "INSERT INTO $table ($fields) VALUES ($values)";
        $statement = $pdo->prepare($sql);
        foreach($data as $key => $value){
            $statement->bindValue(":$key", $value);
        }

        $statement->execute();

    }


    public function listClient($table){
        $pdo = self::getInstance();
        $sql = "SELECT * FROM $table";

        $statement = $pdo->query($sql);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function deleteClient($table, $id){
        $pdo = self::getInstance();
        $sql = "DELETE FROM $table WHERE id = :id";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();
    }

    public function getInfo($table, $id){
        $pdo = self::getInstance();
        $sql = "SELECT * FROM $table WHERE id = :id";

        $statement = $pdo->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function updateClient($table,$data, $id){
        $pdo = self::getInstance();
        $new_values = "";
        foreach($data as $key => $values){
            $new_values .= "$key=:key, ";
        }
        $new_values = substr($new_values, 0, 2);
        $sql = "UPDATE $table SET $new_values WHERE id = :id";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(":id", $id);

        foreach($data as $key => $value){
            $statement->bindValue($key, $value);
        }

        $statement->execute();
    }

    public function selectWhere($numParams, $params, $paramPost, $tabela){
        $queryDinamica = '';
        $qd = '';
        $pdo = self::getInstance();


        for($i = 0; $i < $numParams; $i++){
            $bindParams = substr_replace($params[$i], ':', 0, 0);
            $addPlus = $params[$i] . ' = ' . $bindParams . ' && ';
            $qd .= $addPlus;
            $queryDinamica = substr($qd, 0, -4);
        }
        $sql = "SELECT * FROM $tabela WHERE $queryDinamica";
        $statement = $pdo->prepare($sql);

        for ($i = 0; $i < $numParams; $i++){
            $statement->bindValue(":". $params[$i],
                $paramPost[$i]);
        }
        $statement->execute();
        return $statement->fetchAll();
    }
}

