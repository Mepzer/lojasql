<!DOCTYPE html>
<?php
if (isset($_SESSION['loginok']))
{
    header("Location: login.php");
    die();
}
?>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Primeira avaliação</title>
    <style>
    body{
        background-color:#2c2f33;
    }
    h3{
        color:white;
    }
    a {
        background-color:#7289da;
        border-radius: 4px;
    }
    </style>
    
</head>
    <body>
        <center>
            
            <h3><a href="produtos.php" style="text-decoration: none;color:white;">Cadastro de Produtos</a><a href="clientes.php" style="text-decoration: none;color:white;">Cadastro de Clientes</a></h3>
        </center>       
    </body>
</html>