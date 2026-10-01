<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabuada</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Tabuada</h1>
    <hr>

    <?php
    $numero = (int) ($_POST['numero'] ?? 0);
    ?>

    <table>
        <thead>
            <tr>
                <th>Operação</th>
                <th>Resultado</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $contador = 1;

            while ($contador <= 10) {
                $r = $numero * $contador;

                echo "<tr>";
                echo "<td>$numero X $contador</td>";
                echo "<td>$r</td>";
                echo "</tr>";

                $contador++;
            }
            ?>
        </tbody>
    </table>

    <a href="index.html">Voltar</a>

</body>
</html>