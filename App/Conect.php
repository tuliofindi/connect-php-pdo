<?php

namespace App;

class Conect
{
    //Yours dates connect database
    private $dsn = "mysql:host=localhost;dbname=php_pdo";
    private $user = "root";
    private $pwd = "";

    public function myConected($email, $password)
    {
        try {
            $conn = new \PDO($this->dsn, $this->user, $this->pwd);
            $query = "SELECT * FROM tb_users WHERE email = '{$email}' AND senha = '{$password}'";
            $conn = $conn->query($query, \PDO::FETCH_OBJ);
            return "{$query}<hr>{$conn->fetchAll()}";
        } catch (\PDOException $th) {
            return "Código do Erro: {$th->getCode()} - Mensagem de Erro: {$th->getMessage()}";
        }
    }
}
