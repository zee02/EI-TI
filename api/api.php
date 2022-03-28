<?php
header('Content-Type: text/html; charset=utf-8');

if($_SERVER['REQUEST_METHOD'] == "POST"){
    echo "recebido um post";
}elseif($_SERVER['REQUEST_METHOD'] == "GET"){
    echo "recebido um get";
}else{
    echo "metodo nao permitido";
}

print_r($_POST);

$valor_temperatura = file_get_contents("/Applications/MAMP/htdocs/EI-TI/api/files/temperatura/valor.txt");
$hora_temperatura = file_get_contents("/Applications/MAMP/htdocs/EI-TI/api/files/temperatura/hora.txt");
$log_temperatura = file_get_contents("/Applications/MAMP/htdocs/EI-TI/api/files/temperatura/log.txt");
$nome_temperatura = file_get_contents("/Applications/MAMP/htdocs/EI-TI/api/files/temperatura/nome.txt");

if(isset($_POST['nome'])){
   echo "Nome encontrado...";
} else{
    echo "Nome não encontrado...";
}

if(isset($_POST['hora'])){
    echo "Hora definida... A executar";
    file_put_contents("/Applications/MAMP/htdocs/EI-TI/api/files/temperatura/".$_POST['nome'].".txt", $_POST['hora']);
    exit();
}else {
    echo "Hora não encontrada...";
}

if(isset($_POST['valor'])){
    echo "Valor definido... A executar...";
    file_put_contents("/Applications/MAMP/htdocs/EI-TI/api/files/temperatura/".$_POST['nome'].".txt", $_POST['valor']);
    exit();
}else {
    echo "Valor não encontrado...";
}

?>

