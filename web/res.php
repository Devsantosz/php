<?php

header('Content-Type: application/json; charset=utf-8');

$method = $_SERVER['REQUEST_METHOD'];
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

function responder(int $status, array $dados): never
{
    http_response_code($status);
    echo json_encode($dados, JSON_UNESCAPED_UNICODE);
    exit;
}

if ($path !== '/usuarios') {
    responder(404, ['erro' => 'Rota não encontrada']);
}

switch ($method) {
    case 'GET':
        responder(200, [
            ['id' => 1, 'nome' => 'Ana'],
            ['id' => 2, 'nome' => 'Rui'],
        ]);

    case 'HEAD':
        // HEAD deve responder como GET, mas sem enviar o corpo.
        http_response_code(200);
        exit;

    case 'POST':
        $dados = json_decode(file_get_contents('php://input'), true);

        if (!is_array($dados) || empty($dados['nome'])) {
            responder(400, ['erro' => 'Envie um nome válido']);
        }

        // Aqui, normalmente você salvaria o usuário no banco de dados.
        responder(201, ['mensagem' => 'Usuário criado', 'usuario' => $dados]);

    case 'PUT':
        $dados = json_decode(file_get_contents('php://input'), true);

        if (!is_array($dados)) {
            responder(400, ['erro' => 'Envie um JSON válido']);
        }

        // Normalmente, substituiria todos os dados do usuário no banco.
        responder(200, ['mensagem' => 'Usuário substituído', 'usuario' => $dados]);

    case 'PATCH':
        $dados = json_decode(file_get_contents('php://input'), true);

        if (!is_array($dados)) {
            responder(400, ['erro' => 'Envie um JSON válido']);
        }

        // Normalmente, alteraria somente os campos enviados.
        responder(200, ['mensagem' => 'Usuário atualizado parcialmente', 'alteracoes' => $dados]);

    case 'DELETE':
        // Normalmente, removeria o usuário do banco.
        http_response_code(204);
        exit;

    case 'OPTIONS':
        header('Allow: GET, HEAD, POST, PUT, PATCH, DELETE, OPTIONS');
        http_response_code(204);
        exit;

    default:
        header('Allow: GET, HEAD, POST, PUT, PATCH, DELETE, OPTIONS');
        responder(405, ['erro' => 'Método não permitido']);
}