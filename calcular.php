<?php
// Estacionamento Park Fácil — calcular.php

$horas   = (int) ceil((float) ($_POST['horas'] ?? 0));
$veiculo = $_POST['veiculo'] ?? '';
$lavagem = isset($_POST['lavagem']);   // true ou false

if ($horas < 1) {
    $horas = 1; // cobra no mínimo a 1ª hora
}

// Carro: 1ª hora R$ 10, adicional R$ 6 | Moto: 1ª hora R$ 6, adicional R$ 3
if ($veiculo == "C") {
    $primeira  = 10;
    $adicional = 6;
} else {
    $primeira  = 6;
    $adicional = 3;
}

$total = $primeira + ($horas - 1) * $adicional;

if ($total > 50) {
    $total = 50;
}

if ($lavagem) {
    $total += 20;
}

echo "<h1>Estacionamento Park Fácil</h1>";
echo "<p>Horas: " . htmlspecialchars($horas) . "</p>";
echo "<p>Veículo: " . ($veiculo == "C" ? "Carro" : "Moto") . "</p>";
echo "<p>Lavagem: " . ($lavagem ? "Sim" : "Não") . "</p>";
echo "<p>Total: R$ " . number_format($total, 2, ',', '.') . "</p>";
?>