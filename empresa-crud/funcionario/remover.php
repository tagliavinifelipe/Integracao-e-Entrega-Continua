<?php
//obter o ID
$id = $_GET['id'];
//criar o DELETE SQL
$sql = "delete from funcionario WHERE id = $id";
//EXECUTAR
include_once("../conexao.php");//conectar ao BD
$result=mysqli_query($conexao,$sql);
//REdirecionar para o listar
if ($result)
{
    header("location:listar.php");
}
else
{
    $mysqli_error($conexao);
}
?>
