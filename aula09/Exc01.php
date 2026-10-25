<?php ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Laços e Arrays</title>
</head>
<body>
    <h2>Funcao media</h2>

    <!--Enviar para a variavel $nome pelo metodo get-->
    <form method="get">
      <input name="nome" type="text" placeholder="Digite seu nome: ">
      <button type="submit">Enviar</button>
    </form>

    <?php
    // Captura o valor de "nome" na URL (fallback para 'Visitante')
    $nome = $_GET['nome'] ?? 'Visitante';
    //Caso nn escreva o nome, a varivel ira receber 'Visitante'
    echo "<p>Olá, <strong>$nome</strong>!</p>";
    ?>

    <?php
    //Passsa os parametros para a funcao
    function media($a, $b, $c) {
        return ($a + $b + $c) / 3;
        //Faz a soma das variaveis e dps divide
    }
    ?>

    <?php
    $resultado = null;
    //Verifica se o form foi enviado pelo metodo POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //Se todos foram enviados em post e sao int
        $a = (int)$_POST['a'];
        $b = (int)$_POST['b'];
        $c = (int)$_POST['c'];
        $resultado = media($a,$b,$c);
    }
    ?>
    
    <form method="post">
      <input name="a" type="number" placeholder="nota 1">
      <input name="b" type="number" placeholder="nota 2">
      <input name="c" type="number" placeholder="nota 3">
      <button type="submit">Calculcar media</button>
    </form>

    <?php if ($resultado !== null): ?>
        <p><strong>Media: </strong><?=$resultado?></p>
    <?php endif; ?>

</body>
</html>
