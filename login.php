<?php include("conexão.php");
    $nome = filter_input(INPUT_POST, 'nome');
    $senhal = filter_input(INPUT_POST, 'senha');
                try{
                    $query = 'SELECT * FROM usuarios WHERE nome=? and senha=?';
                    $stmt = $connection->prepare($query);
                    $stmt->bindParam(1, $nome);
                    $stmt->bindParam(2, $senhal);
                    $stmt->execute();
                    $usuario = $stmt->fetch(); 
                    if(empty($usuario)){
                        $_SESSION['loginerr'] = "Login inválido";
                        header('location: index.php');  
                    } else {
                        $_SESSION['loginok'] = 'Login ok';
                        header('location: inicio.php');  
                    }  
                }catch(Exception $e){
                    $_SESSION['loginerr'] = "Login inválido";
                    header('location: index.php');
                }  
?>








