
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Interatividade Web</title>
</head>
<body>
    <h2>Tratamento de str</h2>

    <form method="get">
        <input type="text" name="nome" placeholder="Digite seu nome">
        <button type="submit">Enviar</button>
    </form>

    <?php
        $nome = $_GET['nome'] ?? 'Visitante';
        //Recebe o nome do usuario e faz o tratamento para tudo maiusculo
        $nome = strtoupper($nome);
        //Faz a exibicao do nome
        echo "<p>Olá, <strong>$nome</strong>!</p>";
    ?>
    <?php
    $resultado = null;
    //Confirmacao de metodo
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //Confirmacao de variavel enviada
        $a = $_POST['a'];
        //Tratamento de str com var que foi solicitada ao usuario
        $resultado = strtoupper($a);
    }
    ?>
    <form method="post">
      <input name="a" type="text" placeholder="Digite Sua comida favorita: ">
      <button type="submit">Mostrar</button>
    </form>
    <?php if ($resultado !== null): ?>
        <p><strong>Comida: </strong><?=$resultado?></p>
    <?php endif; ?>
    
</body>
</html>

