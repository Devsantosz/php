
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Interatividade Web</title>
</head>
<body>
    <h2>Parâmetros pela URL (GET)</h2>

    <form method="get">
        <input type="text" name="nome" placeholder="Digite seu nome">
        <button type="submit">Enviar</button>
    </form>

    <?php
        $nome = $_GET['nome'] ?? 'Visitante';
        echo "<p>Olá, <strong>$nome</strong>!</p>";
    ?>
    <hr>
    <h2>Calculadora de Formulário (POST)</h2>
    <?php
    $resultado = null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $a = (float)$_POST['a'];
        $b = (float)$_POST['b'];
        $operacao = $_POST['operacao'];

        //Diferentes operacoes com seus valores diferentes
        //Somar,Subtracao,Multi,Divisao
        if ($operacao == 'somar') {
            $resultado = $a + $b;
        } elseif ($operacao == 'subtrair') {
            $resultado = $a - $b;
        } elseif ($operacao == 'multiplicar') {
            $resultado = $a * $b;
        } elseif ($operacao == 'dividir') {
            if ($b != 0) {
                $resultado = $a / $b;
            } else {
                echo "<p>Não é possível dividir por zero!</p>";
            }
        }
    }
    ?>

    <form method="post">
            <input name="a" type="number" step="any" placeholder="Digite A" required>
            <input name="b" type="number" step="any" placeholder="Digite B" required>
        <button type="submit" name="operacao" value="somar">Somar</button>
        <button type="submit" name="operacao" value="subtrair">Subtração</button>
        <button type="submit" name="operacao" value="multiplicar">Multiplicação</button>
        <button type="submit" name="operacao" value="dividir">Divisão</button>
    </form>

    <?php if ($resultado !== null): ?>
        //O resultado sera exibido aqui
        <p><strong>Resultado: </strong><?=$resultado?></p>
    <?php endif; ?>

</body>
</html>

