<?php
$nome   = $_POST['tnome'];
$total  = (float) $_POST['ttotal'];
$faixa  = $_POST['tfaixa'];
$cartao = isset($_POST['tcartao']);

// Percentuais de desconto
$descMenor50  = 0;    // menor de 50
$desc51a70    = 7;    // 51 a 70
$descMaior70  = 10;   // maior de 70
$descCartao   = 5;    // cartão fidelidade

// Processamento
if ($faixa == "menor50")
{
    $percIdade = $descMenor50;
}
elseif ($faixa == "51a70")
{
    $percIdade = $desc51a70;
}
else
{
    $percIdade = $descMaior70;
}

$descontoIdade = $total * ($percIdade / 100);

if ($cartao == true)
{
    $descontoCartao = $total * ($descCartao / 100);
}
else
{
    $descontoCartao = 0;
}

$valorFinal = $total - $descontoIdade - $descontoCartao;

// Máximo de parcelas
$maxParcelas = 6;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmácia Cavallaro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Farmácia Cavallaro</h1>
    <hr>
    <p><em>Resultado da compra</em></p>

    <?php
    echo "<p><strong>Nome:</strong> $nome</p>";
    echo "<p><strong>Total:</strong> R$ " . number_format($total, 2, ',', '.') . "</p>";
    echo "<p><strong>Desconto por idade:</strong> R$ " . number_format($descontoIdade, 2, ',', '.') . "</p>";
    echo "<p><strong>Desconto do cartão:</strong> R$ " . number_format($descontoCartao, 2, ',', '.') . "</p>";
    ?>

    <h2>
        <?php echo "Valor final R$ " . number_format($valorFinal, 2, ',', '.'); ?>
    </h2>

    <h3>Parcelamento (com for)</h3>
    <ul>
        <?php
        for ($parcela = 1; $parcela <= $maxParcelas; $parcela++) {
            $valorParcela = $valorFinal / $parcela;

            echo "<li>{$parcela}x de R$ " . number_format($valorParcela, 2, ',', '.') . "</li>";
        }
        ?>
    </ul>

    <?php /* Parcelamento com while (comentado a pedido do professor)
    <h3>Parcelamento (com while)</h3>
    <ul>
        <?php
        $contador = 1;

        while ($contador <= $maxParcelas) {
            $valorParcela = $valorFinal / $contador;

            echo "<li>{$contador}x de R$ " . number_format($valorParcela, 2, ',', '.') . "</li>";

            $contador++;
        }
        ?>
    </ul>
    */ ?>

    <a href="index.html">Voltar</a>

</body>
</html>