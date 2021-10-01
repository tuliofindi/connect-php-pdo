<?php

// print_r($_POST);
// echo "<hr>";

// require __DIR__ . "/App/Conect.php";

// use App\Conect;

//Yours dates connect database
$dsn = "mysql:host=localhost;dbname=php_pdo";
$user = "root";
$pwd = "";

try {
    if (!empty($_POST['email']) and !empty($_POST['password'])) {
        $conn = new \PDO($dsn, $user, $pwd);
        $query = "SELECT * FROM tb_users WHERE";
        $query .= " email = :email";
        $query .= " AND senha = :password";

        $connect = $conn->prepare($query);
        $connect->bindValue(":email", $_POST['email']);
        $connect->bindValue(":password", $_POST['password']);
        $connect->execute();
        $dadosUser = $connect->fetch();

        $objectUser = (object) $dadosUser;
        $array = (array) $objectUser;


        echo 'Usuario Logado com sucesso<br>';
        echo $query . '<br>';
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    } else {
        echo "Erro ao fazer login";
    }
} catch (\PDOException $th) {
    echo "Código do Erro: {$th->getCode()} - Mensagem de Erro: {$th->getMessage()}";
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>

    <form action="" method="POST">
        <input type="text" name="email" placeholder="Usuário">
        <br>
        <input type="password" name="password" placeholder="Senha">
        <br>
        <button type="submit">Login</button>

    </form>

</body>

</html>