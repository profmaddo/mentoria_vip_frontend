<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];


    echo "Nome: ".$nome."\n";
    echo "Email: ".$email."\n";
    echo "Telefone: ".$telefone."\n";



} else {
    http_response_code(405);
    echo json_encode(['message' => 'Método não permitido']);
}
?>