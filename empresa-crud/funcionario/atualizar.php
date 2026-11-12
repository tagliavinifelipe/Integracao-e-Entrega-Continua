<?php
    $id=$_POST['id']; //vem do campo hidden do form
    $nome=$_POST['name']; //o form do editar.php envia o nome como "name"
    $email=$_POST['email'];
    $cargo=$_POST['cargo'];
    $salario=$_POST['salario'];
    $admissao=$_POST['admissao'];
    //checkbox desmarcado nao vem no POST
    if(isset($_POST['ativo']))
    {
        $ativo=1;
    }
    else
    {
        $ativo=0;
    }
    //CRIAR O COMANDO SQL
    $sql="update funcionario set nome='$nome',email='$email',cargo='$cargo',
        salario=$salario,data_admissao='$admissao',ativo=$ativo where id=$id";
    require_once("../conexao.php");
    $resposta=mysqli_query($conexao,$sql);
    if($resposta==true)
    {
        header("location:listar.php");//redirecionamento
    }
?>
