<?php

print_r($_POST);
echo "<hr>";

require __DIR__ . "/App/Conect.php";

use App\Conect;

if (!empty($_POST['email']) and !empty($_POST['password'])) {

    $conn = new Conect();

    echo "<pre>";
    print_r($conn->myConected($_POST['email'], $_POST['password']));
    echo "</pre>";

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