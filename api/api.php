<?php
header('Content-Type: text/html; charset=utf-8');

$valor_temperatura = file_get_contents("/Applications/MAMP/htdocs/EI-TI/api/files/temperatura/valor.txt");
$hora_temperatura = file_get_contents("/Applications/MAMP/htdocs/EI-TI/api/files/temperatura/hora.txt");
$log_temperatura = file_get_contents("/Applications/MAMP/htdocs/EI-TI/api/files/temperatura/log.txt");
$nome_temperatura = file_get_contents("/Applications/MAMP/htdocs/EI-TI/api/files/temperatura/nome.txt");

if($_SERVER['REQUEST_METHOD'] == "POST"){
print_r($_POST);

if(isset($_POST["nome"]) && isset($_POST["hora"]) && isset($_POST["valor"])){
    file_put_contents("/Applications/MAMP/htdocs/EI-TI/api/files/".$_POST['nome']."/hora.txt",$_POST["hora"]);
    file_put_contents("/Applications/MAMP/htdocs/EI-TI/api/files/".$_POST['nome']."/valor.txt", $_POST["valor"]);
    file_put_contents("/Applications/MAMP/htdocs/EI-TI/api/files/".$_POST['nome']. "/log.txt", $_POST["hora"].";".$_POST["valor"].PHP_EOL, FILE_APPEND);
} else{
    echo "Erro na API";
}
}elseif($_SERVER['REQUEST_METHOD'] == "GET"){
    echo "metodo get";
}else {
    echo "metodo errado";
}

?>
