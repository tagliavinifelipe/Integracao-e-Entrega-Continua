<?php
$n1 = (float) ($_POST['n1'] ?? 0);
$n2 = (float) ($_POST['n2'] ?? 0);

$adicao        = $n1 + $n2;
$subtracao     = $n1 - $n2;
$multiplicacao = $n1 * $n2;
$divisao       = ($n2 != 0) ? $n1 / $n2 : 'indefinido (divisão por zero)';
$modulo        = ($n2 != 0) ? fmod($n1, $n2) : 'indefinido (divisão por zero)';
$potencia      = $n1 ** $n2;
$concatenacao  = $n1 . $n2;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operações aritméticas</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div>
        <h1>Resultados</h1>
        <hr>
        <?php
        echo "<p>Números informados: <strong>$n1</strong> e <strong>$n2</strong></p>";

        echo "<table>";
        echo "<tr><th>Adição</th><td>$adicao</td></tr>";
        echo "<tr><th>Subtração</th><td>$subtracao</td></tr>";
        echo "<tr><th>Multiplicação</th><td>$multiplicacao</td></tr>";
        echo "<tr><th>Divisão</th><td>$divisao</td></tr>";
        echo "<tr><th>Módulo (resto)</th><td>$modulo</td></tr>";
        echo "<tr><th>Potência</th><td>$potencia</td></tr>";
        echo "<tr><th>Concatenação</th><td>$concatenacao</td></tr>";
        echo "</table>";
        ?>
        <a href="index.php">Voltar</a>
    </div>
</body>
</html>