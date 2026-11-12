<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMPRESA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php
        include("../menu.php");
    ?>
    <div class="container">
        <h1>Cadastro de Funcionário</h1>
        <form action="inserir.php" method="post">
            <p>
                <label for="nome">Nome:</label>
                <input type="text" name="name" required>
            </p>
            <p>
                <label for="email">E-mail:</label>
                <input type="email" name="email" required>
            </p>
            <p>
                <label for="cargo">Cargo:</label>
                <input type="text" name="cargo" required>
            </p>
            <p>
                <label for="salario">Salário base:</label>
                <input type="number" name="salario" step="0.01" required>
            </p>
            <p>
                <label for="data">Data de Adimissão</label>
                <input type="date" name="admissao" required>
            </p>
            <p>
                <input type="submit" value="Cadastrar">
                <input type="reset" value="Limpar">
            </p>
        </form>
    </div>
</body>
</html>
