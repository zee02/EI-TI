<?php
// if(isset($_GET['username'])){
//     echo "o username submetido foi: ".$_GET['username']. "<br>";
// }
// if(isset($_GET['password'])){
//     echo "a password submetida foi: ". $_GET['password']. "<br>";
// }
session_start();
$username = "ola";
$password = "123123";

if (isset($_POST['username']) && isset($_POST['password'])) {
    if ($_POST['username'] == $username && $_POST['password'] == $password) {
        echo "Login com sucesso..." . "<br>";
        $_SESSION["teste"]=$_POST['teste'];
        header('Location: dashboard.php');
    } else {
        echo "Login invalido..." . "<br>";
    }
} else {
    echo "Nada inserido..." . "<br>";
}

?>

<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<body>
    <div class="container">
        <form method="post">
            <a href="index.php"><img src="estg.png"></a>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="text" required placeholder="Escreva o username" class="form-control" name="username" id="username">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" required placeholder="Escreva a password" class="form-control" name="password" id="password">
            </div>
            <button type="submit" style="margin-top: 10px;" class="btn btn-primary">Submeter</button>
        </form>
    </div>
</body>
</head>

</html>