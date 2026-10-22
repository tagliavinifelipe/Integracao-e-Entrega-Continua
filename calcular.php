<?php
// Estacionamento Park Fácil — calcular.php
// Recebe os dados do formulário do index.html (campos: horas, veiculo, lavagem)

$horas   = (int) ceil((float) ($_POST['horas'] ?? 0));
$veiculo = $_POST['veiculo'] ?? '';
$lavagem = isset($_POST['lavagem']);   // true se a caixa foi marcada

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

$total = $primeira;

for ($h = 2; $h <= $horas; $h++) {
    $total = $total + $adicional;
}

// Teto de R$ 50 para o estacionamento
if ($total > 50) {
    $total = 50;
}

// Lavagem: + R$ 20
if ($lavagem) {
    $total += 20;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Park Fácil — Resultado</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="arena" aria-hidden="true">
        <div class="cena">
            <div class="fundo"></div>
            <div class="metade metade-mago">
                <div class="recorte"></div>
                <div class="aura aura-mago"></div>
                <div class="joia"></div>
                <div class="circulo-magico"><span></span></div>
                <div class="brilho brilho-mago"></div>
            </div>
            <div class="metade metade-dragao">
                <div class="recorte"></div>
                <div class="aura aura-dragao"></div>
                <div class="orbe"></div>
                <div class="brilho brilho-dragao"></div>
            </div>
        </div>
        <div class="nevoa"></div>
        <div class="particulas"></div>
        <div class="relampago"></div>
        <div class="vinheta"></div>
        <div class="pilar"></div>
        <div class="circulo-invocacao"><span></span><span></span></div>
        <span class="placar placar-mago">Dark Magician<small>ATK 2500 / DEF 2100</small></span>
        <span class="placar placar-dragao">Blue-Eyes White Dragon<small>ATK 3000 / DEF 2500</small></span>
    </div>
    <div class="container">
        <h1>Estacionamento Park Fácil</h1>
        <div class="nivel" role="img" aria-label="Nível 8">
            <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
        </div>
        <hr>
        <div class="codigo">PARK-PT001</div>
        <div class="resultado">
            <p><strong>Horas:</strong> <?php echo htmlspecialchars($horas); ?></p>
            <p><strong>Veículo:</strong> <?php echo $veiculo == "C" ? "Carro" : "Moto"; ?></p>
            <p><strong>Lavagem:</strong> <?php echo $lavagem ? "Sim" : "Não"; ?></p>
            <p class="total"><strong>Total: R$ <?php echo number_format($total, 2, ',', '.'); ?></strong></p>
            <p class="acoes"><a class="botao" href="index.html">Voltar</a></p>
        </div>
        <div class="rodape">
            <span>00000001 &nbsp;1ª Edição</span>
            <span>©2026 PARK FÁCIL</span>
        </div>
    </div>
</body>
</html>
