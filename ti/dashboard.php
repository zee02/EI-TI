<?php 
session_start();
if(!isset($_SESSION['username'])){
    header("refresh:5;url=index.php");
    die("Acesso restrito.");
}
?>

<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Plataforma IoT</title>
</head>

<style>
.img {
    display: block;
    margin-left: auto;
    margin-right: auto;
}
.float-container {
    border: 3px solid #fff;
    padding: 10px;
}
.float-child {
    width: 50%;
    float: left;
    padding: 1px;
}
</style>

<body>

    <!--BARRA DE NAVEGAÇÃO-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Dashboard EI-TI</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Histórico</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
            </div>
        </div>
    </nav><br>

    <!--SERVIDOR IOT CABECALHO-->
    <div class="container">
        <div class="card" style="width:auto">
            <div class="card-body" class="float-container" position="in" style="display:inline">
                <div class="float-child">
                    <h1 class="card-title">Servidor IoT</h1>
                    <p class="card-text">Bem vindo <b>Utilizador</b></p>
                    <p style="font-size:small">Tecnologias da Internet - Engenharia Informática</p>
                </div>
                <div class="float-child" style="display:inline">
                    <img src="lab02_icons/estg.png" class="float-end" alt="ESTG" width="300px">
                </div>
            </div>
        </div>
    </div><br>

    <!--3 PAINEIS DE CONTROLO-->
   <div class="container">
       <div class="row">
           <div class="col-sm">
                <div class="card">
                    <div class="card-header" style="text-align: center;"><b>Luminosidade: 80%</b></div>
                    <div class="card-body">
                        <img src="lab02_icons/dia.png" alt="humidade" class="img">
                    </div>
                    <div class="card-footer" style="text-align: center;">Atualização: 2022/03/01 14:31 - <a href=”#” >Histórico</a></div>
                </div>
           </div>
           <div class="col-sm">
                <div class="card">
                    <div class="card-header" style="text-align: center;"><b>Temperatura: 22%</b></div>
                    <div class="card-body">
                        <img src="lab02_icons/temperature.png" alt="humidade" class="img">
                    </div>
                    <div class="card-footer" style="text-align: center;">Atualização: 2022/03/01 14:31 - <a href=”#” >Histórico</a></div>
                </div>
           </div>
           <div class="col-sm">
                <div class="card">
                    <div class="card-header" style="text-align: center;"><b>Humidade: 85%</b></div>
                    <div class="card-body" >
                        <img src="lab02_icons/door.png" alt="humidade" class="img">
                    </div>
                    <div class="card-footer" style="text-align: center;">Atualização: 2022/03/01 14:31 - <a href=”#” >Histórico</a></div>
                </div>
           </div>
       </div>
    </div><br>
   
   <!--TABELA DE INFORMAÇÃO-->
   <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Tipo de Dispositivo IoT</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Data de Atualização</th>
                    <th scope="col">Estado Alertas</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Sensor de Luz</td>
                    <td>1000</td>
                    <td>2021/03/01 14:31</td>
                    <td><span class="badge rounded-pill bg-success">Ativo</span></td>
                </tr>
                <tr>
                    <td>Temperatura</td>
                    <td>22º</td>
                    <td>2021/03/01 14:31</td>
                    <td><span class="badge rounded-pill bg-danger">Desativo</span></td>
                </tr>
                <tr>
                    <td>Humidade</td>
                    <td>85%</td>
                    <td>2021/03/01 14:31</td>
                    <td><span class="badge rounded-pill bg-warning text-dark">Warning</span></td>
                </tr>
                <tr>
                    <td>Luminosidade</td>
                    <td>80%</td>
                    <td>2021/03/01 14:31</td>
                    <td><span class="badge rounded-pill bg-danger">Muito Forte</span></td>
                </tr>
            </tbody>
        </table>
   </div>


</body>

</html>