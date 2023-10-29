<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['nome']) && isset($data['email'])) {
        try {
            $db = new PDO('mysql:host=localhost;dbname=your_database',
                'username', 'password');
            $sql = "INSERT INTO clientes (nome, email, telefone) VALUES (:nome, :email, :telefone)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':nome', $data['nome']);
            $stmt->bindParam(':email', $data['email']);
            $stmt->bindParam(':telefone', $data['telefone']);
            $stmt->execute();

            http_response_code(201);
            echo json_encode(['message' => 'Novo cliente adicionado com sucesso']);
        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode(['message' => 'Erro ao adicionar novo cliente: ' . $e->getMessage()]);
        }
    } else {
        http_response_code(400);
        echo json_encode(['message' => 'Dados incompletos']);
    }
} else {
    http_response_code(405);
    echo json_encode(['message' => 'Método não permitido']);
}
?>
