<?php
$n1 = (float) $_POST['n1'];
$n2 = (float) $_POST['n2'];

$adicao        = $n1 + $n2;
$subtracao     = $n1 - $n2;
$multiplicacao = $n1 * $n2;

$divisaoValida = ($n2 != 0);

if ($divisaoValida == true)
{
    $divisao = $n1 / $n2;
    $modulo  = fmod($n1, $n2);
}

$potencia     = $n1 ** $n2;
$concatenacao = $n1 . $n2;
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
        <h1>Operações aritméticas</h1>
        <hr>
        <h3>
            <?php echo "$n1 + $n2 = ".number_format($adicao,2,',','.'); ?>
        </h3>
        <h3>
            <?php echo "$n1 - $n2 = ".number_format($subtracao,2,',','.'); ?>
        </h3>
        <h3>
            <?php echo "$n1 x $n2 = ".number_format($multiplicacao,2,',','.'); ?>
        </h3>
        <h3>
            <?php
                if ($divisaoValida == true)
                {
                    echo "$n1 ÷ $n2 = ".number_format($divisao,2,',','.') ;
                    echo "<br>";
                    echo "$n1 módulo $n2 = ".number_format($modulo,2,',','.') ;
                }
                else
                {
                    echo "<h1>Não há divisão por zero!</h1>";
                }
            ?>
        </h3>
        <h3>
            <?php echo "$n1 <sup> $n2 </sup> =".number_format($potencia,2,',','.'); ?>
        </h3>
        <h3>
            <?php echo "$n1 concatenado $n2  = $concatenacao" ?>
        </h3>
        <a href="index.php">Voltar</a>
    </div>
</body>
</html>