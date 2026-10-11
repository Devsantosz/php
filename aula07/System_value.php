<?php
// Projeto Integrador: Sistema de Vendas e Comissões
function calcularComissao($valorVenda) {
    if($valorVenda >= 400){
        return $valorVenda * 0.20; // 20% de comissão
    }else{
        return $valorVenda * 0.10; // 10% de comissão
    }
}

// Array multidimensional simulando um banco de dados de vendas
$vendas = [
    ["id" => 101, "valor" => 250.00, "status" => "pago"],
    ["id" => 102, "valor" => 400.00, "status" => "pago"],
    ["id" => 103, "valor" => 600.00, "status" => "pago"],
    ["id" => 104, "valor" => 150.00, "status" => "pago"]
];

$faturamentoTotal = 0;
$comissaoTotal = 0;

echo "=== RESUMO DE VENDAS ===\n";

foreach ($vendas as $venda) {
    // Valida se a venda foi paga
    if ($venda["status"] === "pago") {
        $faturamentoTotal += $venda["valor"];
        $comissao = calcularComissao($venda["valor"]);
        $comissaoTotal += $comissao;
        
        echo "Venda #" . $venda["id"] . " - R$ " . $venda["valor"] . " (Comissão: R$ " . $comissao . ")\n";
    } else {
        echo "Venda #" . $venda["id"] . " - AGUARDANDO PAGAMENTO (Ignorada no faturamento)\n";
    }
}

echo "------------------------\n";
echo "Faturamento Total: R$ $faturamentoTotal\n";
echo "Comissões a Pagar: R$ $comissaoTotal\n";
echo "========================\n";
?>
