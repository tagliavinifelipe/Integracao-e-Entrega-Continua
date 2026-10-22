<?php
// Empresa — funcionario/remover.php
// Recebe o id do listar.php (botão Remover) e apaga o funcionário

require "../conexao.php";

$id = (int) ($_POST['id'] ?? 0);   // (int) garante que só um número vai para o SQL

$ok = mysqli_query($conexao, "DELETE FROM funcionario WHERE id = $id");

if (!$ok) {
    $mensagem = "Erro ao remover: " . mysqli_error($conexao);
} elseif (mysqli_affected_rows($conexao) == 0) {
    $ok       = false;
    $mensagem = "Funcionário não encontrado.";
} else {
    $mensagem = "Funcionário removido com sucesso!";
}

$base = "../";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresa — Remoção</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="<?php echo $base; ?>css/estilo.css" rel="stylesheet">
</head>
<body>
    <?php include "../menu.php"; ?>
    <div class="container">
        <h1>Remoção de funcionário</h1>
        <div class="caixa">
            <div class="alert <?php echo $ok ? "alert-success" : "alert-warning"; ?>">
                <?php echo htmlspecialchars($mensagem); ?>
            </div>
            <a class="btn btn-outline-secondary" href="listar.php">Voltar para a lista</a>
        </div>
    </div>
</body>
</html>
