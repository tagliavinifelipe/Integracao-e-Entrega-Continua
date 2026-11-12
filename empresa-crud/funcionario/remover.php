<?php
    $id=$_GET['id']; //pega o id vindo da URL
    //CRIAR O COMANDO SQL
    $sql="delete from funcionario where id=$id";
    require_once("../conexao.php");
    $resposta=mysqli_query($conexao,$sql);
    if($resposta==true)
    {
        header("location:listar.php");//redirecionamento
    }
?>
