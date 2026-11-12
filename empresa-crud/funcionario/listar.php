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
        <h1 align="center">LISTAGEM DE FUNCIONÁRIOS</h1>
        <hr>
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Cargo</th>
                    <th>Salário</th>
                    <th>Operação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require_once("../conexao.php");
                    $sql = "select * from funcionario";//cria o SELECT
                    $result=mysqli_query($conexao,$sql); //EXECUTA o sql
                    while ($linha = mysqli_fetch_assoc($result)) //ASSOCIA OS DADOS DO RESULT
                    { //VAMOS FECHAR O PHP PARA DIGITAR HTML A SEGUIR  ?>
                    <tr>
                        <td> <?php echo $linha['nome']; ?></td>
                        <td> <?php echo $linha['cargo']; ?></td>
                        <td> <?php echo $linha['salario']; ?></td>
                        <td>
                            <a href="editar.php?id=<?php echo $linha['id']; ?>" class="btn btn-warning">Editar</a>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalremover<?php echo $linha['id']; ?>">
                            Remover
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="modalremover<?php echo $linha['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Remover Funcionário</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Confirma Exclusão do registro ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <a href="remover.php?id=<?php echo $linha['id']; ?>" class="btn btn-danger">Sim</a>
                                </div>
                                </div>
                            </div>
                            </div>
                        </td>
                    </tr>
                    <?php //reabrir o PHP
                         }  ?>
            </tbody>
        </table>
    </div>
</body>
</html>
