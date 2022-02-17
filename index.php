<?php
    session_start();
    session_destroy();
?>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Segunda avaliação</title>
    <style>
    body{
        background-color:#2c2f33;
    }
    h2{
        color:white;
    }
    .msg{
        color:white;
    }
    </style>
    
</head> 
    <body>
        <center>
        <h2>LOGIN</h2>
            <?php
                if (isset($_SESSION['loginerr'])) : ?>
                <div class="msg">
                    <?php
                    echo $_SESSION['loginerr'];
                    
                    unset($_SESSION['loginerr']);
                    ?>
                </div>
            <?php endif ?>
            <form method="POST" action="login.php">
                <br>
                    <input type="text" placeholder="nome" name="nome">
                <br><br>
                    <input type="password" placeholder="senha" name="senha">
                <br><br><br>
                    <button type="submit" name="login" onclick="isEmpty()">Entrar</button>
            </form>
            <!--VERIFICAÇÃO DE CAMPOS-->
            <?php
                function isEmpty(){
                    $nome = filter_input(INPUT_POST, 'nome');
                    $senha = filter_input(INPUT_POST, 'senha');
                    if(empty($nome)|| empty($senha)){
                        header('location: index.php');
                    }else{
                        header('location: login.php');
                    }    
                }              
            ?>
        </center>       
    </body>
</html>
