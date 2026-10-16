<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form-inscricao</title>
</head>
<body>
    <?php
// Projeto Integrador: Sistema de Processamento de Inscrição Acadêmica

function processarInscricao($dados) {
    $erros = [];
    $sucesso = [];

    // Sanitização e Validação do Nome
    $nome = htmlspecialchars(trim($dados['nome'] ?? ''));
    if (empty($nome)) {
        $erros[] = "O campo Nome é obrigatório.";
    }

    // Sanitização e Validação do E-mail
    $email = trim($dados['email'] ?? '');
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erros[] = "Forneça um endereço de e-mail válido.";
    }

    // Validação da Idade
    $idade = filter_var($dados['idade'] ?? '', FILTER_VALIDATE_INT);
    if ($idade === false || $idade < 16) {
        $erros[] = "A idade mínima para inscrição é 16 anos.";
    }

    // Processamento de Áreas de Interesse (Array)
    $areas = $dados['areas'] ?? [];

    if (empty($erros)) {
        $sucesso['nome'] = $nome;
        $sucesso['email'] = $email;
        $sucesso['idade'] = $idade;
        $sucesso['areas'] = is_array($areas) ? array_map('htmlspecialchars', $areas) : [];
        return ["status" => true, "dados" => $sucesso];
    } else {
        return ["status" => false, "erros" => $erros];
    }
}

// Simulando a submissão de um formulário completo via $_POST
$_POST = [
    'nome' => " Maria Clara Santos ",
    'email' => "maria.santos@aluno.unimetrocamp.edu.br",
    'idade' => "14",
    'areas' => ["Desenvolvimento Web", "Banco de Dados", "Engenharia de Software"]
];

echo "=== SISTEMA DE INSCRIÇÃO ACADÊMICA WYDEN ===\n";

$resultado = processarInscricao($_POST);

if ($resultado['status']) {
    $dadosForm = $resultado['dados'];
    echo "[SUCESSO] Inscrição realizada com sucesso!\n";
    echo "----------------------------------------\n";
    echo "Aluno(a): " . $dadosForm['nome'] . "\n";
    echo "E-mail: " . $dadosForm['email'] . "\n";
    echo "Idade: " . $dadosForm['idade'] . " anos\n";
    echo "Áreas de Interesse:\n";
    foreach ($dadosForm['areas'] as $area) {
        echo "  * " . $area . "\n";
    }
    echo "----------------------------------------\n";
} else {
    echo "[ERRO] Falha no processamento do formulário:\n";
    foreach ($resultado['erros'] as $erro) {
        echo " - " . $erro . "\n";
    }
}
echo "========================================\n";
?>

</body>
</html>