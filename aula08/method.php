<?php
// Simulação da recepção de dados via GET e POST
//Dados de pesquisa
$_GET['busca'] = "Desenvolvimento Web";

//Post sao dados sensiveis
$_POST['usuario'] = "aluno_unimetrocamp";
$_POST['senha'] = "senhaSegura123";

// Identificação do método HTTP da requisição
$metodo = $_SERVER['REQUEST_METHOD'] ?? 'GET';

echo "Método da requisição: $metodo\n";

// Captura de parâmetros via GET
//isset() verifica se a var foi declarada
if (isset($_GET['busca'])) {
    echo "Termo pesquisado via GET: " . $_GET['busca'] . "\n";
}

// Captura de parâmetros via POST
if (isset($_POST['usuario'])) {
    echo "Usuário recebido via POST: " . $_POST['usuario'] . "\n";
}
?>
