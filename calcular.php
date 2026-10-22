<?php
// Estacionamento Park Fácil — calcular.php
// Recebe os dados do formulário do index.html (campos: horas, veiculo, lavagem)

$horas   = $_POST['horas'];
$veiculo = $_POST['veiculo'];

if (isset($_POST['lavagem'])) {
    $lavagem = "Sim";
} else {
    $lavagem = "Não";
}

// Carro: 1ª hora R$ 10, adicional R$ 6 | Moto: 1ª hora R$ 6, adicional R$ 3
if ($veiculo == "C") {
    $primeira  = 10;
    $adicional = 6;
} else {
    $primeira  = 6;
    $adicional = 3;
}

$total = $primeira;

for ($h = 2; $h <= $horas; $h++) {
    $total = $total + $adicional;
}

if(total>50)
{
    $total= 50;
}

if ($lavagem == "sim")
    {
        $total += 20;
    }


echo "total à pagar: R$".$total;
echo "<h1>Estacionamento Park Fácil</h1>";
echo "<p>Horas: $horas</p>";
echo "<p>Veículo: " . ($veiculo == "C" ? "Carro" : "Moto") . "</p>";
echo "<p>Lavagem: $lavagem</p>";
echo "<p>Total: R$ " . number_format($total, 2, ',', '.') . "</p>";
?>
