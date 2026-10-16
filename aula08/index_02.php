<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP1</title>
</head>
<body>
    
<?php
// Simulação de dados enviados por campos do tipo Radio e Checkbox
$_POST['plano'] = "Premium"; // Radio Button (valor único)
$_POST['tecnologias'] = ["HTML5", "CSS3", "PHP", "JavaScript"]; // Checkboxes (array)

$plano = $_POST['plano'] ?? 'Básico';
$tecnologias = $_POST['tecnologias'] ?? [];

echo "=== PREFERÊNCIAS DO USUÁRIO ===\n";
echo "Plano Selecionado: $plano\n";

echo "Tecnologias de Interesse:\n";
if (!empty($tecnologias) && is_array($tecnologias)) {
    foreach ($tecnologias as $tech) {
        echo "- " . htmlspecialchars($tech) . "\n";
    }
    // Formatação em lista separada por vírgulas
    echo "Resumo em linha: " . implode(", ", $tecnologias) . "\n";
} else {
    echo "Nenhuma tecnologia foi selecionada.\n";
}
?>

</body>
</html>