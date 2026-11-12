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
        //obter o ID
        $id = $_GET['id'];//pega o dado vindo da URL
        //executar o SELECT
        $sql = "Select * from funcionario where id=$id";
        require_once("../conexao.php");//carrega a conexao
        $result = mysqli_query($conexao,$sql);
        $funcionario= mysqli_fetch_assoc($result);//associa o resultado a variavel
    ?>
    <div class="container">
        <h1>Edição de Funcionário</h1>
        <form action="atualizar.php" method="post">
            <p>
                <label for="nome">Nome:</label>
                <input type="text" name="name" required value="<?php echo $funcionario['nome']; ?>" >
            </p>
            <p>
                <label for="email">E-mail:</label>
                <input type="email" name="email" required value="<?php echo $funcionario['email']; ?>">
            </p>
            <p>
                <label for="cargo">Cargo:</label>
                <input type="text" name="cargo" required value="<?php echo $funcionario['cargo']; ?>">
            </p>
            <p>
                <label for="salario">Salário base:</label>
                <input type="number" name="salario" step="0.01" required value="<?php echo $funcionario['salario']; ?>">
            </p>
            <p>
                <label for="data">Data de Admissão</label>
                <input type="date" name="admissao" required value="<?php echo $funcionario['data_admissao']; ?>">
            </p>
            <p>
                <label for="ativo">Ativo:</label>
                <input type="checkbox" name="ativo" <?php if ($funcionario['ativo']==1){ echo 'checked'; }  ?>>
            </p>
            <p>

            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" value="Atualizar">
            </p>
        </form>
    </div>
</body>
</html>
