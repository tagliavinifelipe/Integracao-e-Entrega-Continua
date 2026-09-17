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
        <form action="calcular.php" method="post">
            <p>
                <label for="n1">Informe um número:</label>
                <input type="number" step="any" name="n1" id="n1" required>
            </p>
            <p>
                <label for="n2">Informe outro número:</label>
                <input type="number" step="any" name="n2" id="n2" required>
            </p>
            <p>
                <input type="submit" value="Calcular">
                <input type="reset" value="Limpar">
            </p>
        </form>
    </div>
</body>
</html>