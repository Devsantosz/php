<?php

// Dados de conexão com o banco.
define('HOST', '127.0.0.1');
define('PORT', '5432');
define('DBNAME', 'test');
define('USER', 'user');
define('PASSWORD', 'psswd');

try {
    // Cria a conexão com o banco.
    $pdo = new PDO(
        'pgsql:host=' . HOST . ';port=' . PORT . ';dbname=' . DBNAME,
        USER,
        PASSWORD
    );

    // Faz o PDO lançar exceções em caso de erro.
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Lê os dados enviados pelo formulário.
    $login = $_POST['login'] ?? '';
    $pswd = $_POST['pswd'] ?? '';

    // Consulta o usuário com parâmetros para evitar SQL injection.
    $stmt = $pdo->prepare(
        'SELECT * FROM Usuario WHERE login = :login AND password = :password'
    );
    $stmt->execute([
        'login' => $login,
        'password' => $pswd,
    ]);

    // Trata o resultado da consulta.
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    // Evite exibir detalhes do erro em um site público.
    echo 'Não foi possível conectar ou consultar o banco de dados.';
}

// Libera os recursos.
$stmt = null;
$pdo = null;

?>