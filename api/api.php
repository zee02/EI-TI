<?php
header('Content-Type: text/html; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    print_r($_POST);

    if (isset($_POST["nome"]) && isset($_POST["hora"]) && isset($_POST["valor"])) {
        file_put_contents("/Applications/MAMP/htdocs/EI-TI/api/files/" . $_POST['nome'] . "/hora.txt", $_POST["hora"]);
        file_put_contents("/Applications/MAMP/htdocs/EI-TI/api/files/" . $_POST['nome'] . "/valor.txt", $_POST["valor"]);
        file_put_contents("/Applications/MAMP/htdocs/EI-TI/api/files/" . $_POST['nome'] . "/log.txt", $_POST["hora"] . ";" . $_POST["valor"] . PHP_EOL, FILE_APPEND);
    } else {
        echo "Erro na API";
    }
} elseif ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET["nome"])) {
        if (is_dir("/Applications/MAMP/htdocs/EI-TI/api/files/" . $_GET['nome'])) {
            echo file_get_contents("/Applications/MAMP/htdocs/EI-TI/api/files/" . $_GET['nome'] . "/valor.txt");
        } else {
            echo "Erro " . http_response_code(404) . " sensor não existente...";
        }
    } else {
        http_response_code(404);
    }
} else {
    echo "metodo errado";
}
