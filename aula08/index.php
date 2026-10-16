<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP1</title>
</head>
<body>
    
<?php
    // Simulação de entradas enviadas por um formulário web
    $nomeEntrada = "<script>alert('hack');</script> Carlos Eduardo";
    $emailEntrada = "carlos.eduardo@exemplo.com";
    $idadeEntrada = "22";

    // 1. Sanitização para prevenção de XSS
    $nomeSanitizado = htmlspecialchars(trim($nomeEntrada));

    // 2. Validação de E-mail com filter_var
    if (filter_var($emailEntrada, FILTER_VALIDATE_EMAIL)) {
        $emailValidado = $emailEntrada;
    } else {
        $emailValidado = null;
        echo "Aviso: E-mail fornecido é inválido!\n";
    }

    // 3. Validação de Idade como Número Inteiro
    $idadeValidada = filter_var($idadeEntrada, FILTER_VALIDATE_INT);

    echo "Nome Sanitizado: $nomeSanitizado\n";
    echo "E-mail Validado: " . ($emailValidado ?? "E-mail Inválido") . "\n";
    echo "Idade Validada: " . ($idadeValidada !== false ? $idadeValidada . " anos" : "Idade Inválida") . "\n";
    ?>
</body>
    <script>alert('hack');</script>
</html>