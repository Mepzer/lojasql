<?php 
include("conexão.php"); 

#inicializa variaveis 
$nome = "";
$descricao = "";
$id = "";
$update = false;

#voltar inicial
if(isset($_POST['voltar'])){
    //Fechando conexão com o banco de dados
    mysqli_close($db);
    header('location: inicio.php');  
}

#adiciona produto
if(isset($_POST['adiciona'])){

    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    //Verificação de campos vazios
    if($descricao == ''|| $nome == ''){
        $_SESSION['message'] = "Preencha os campos corretamente!";    
        header('location: produtos.php');    
    }else{
        mysqli_query($db, "INSERT INTO produtos(nome, descricao) VALUES ('$nome', '$descricao')");

        #grava mensagem na sessao
        $_SESSION['message'] = "Produto adicionado!";
        header('location: produtos.php');    
    }
    
}

#altera produto
if(isset($_POST['altera'])){
    
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    //Verificação de campos vazios
    if($id == ''||$nome == ''||$descricao == ''){
        $_SESSION['message'] = "Preencha os campos corretamente!";    
        header('location: produtos.php');  
    }else{
        mysqli_query($db, "UPDATE produtos SET nome = '$nome', descricao = '$descricao' WHERE id = $id");

        #grava mensagem na sessao
        $_SESSION['message'] = "Produto alterado!";
        header('location: produtos.php');    
    }
    
}

#remove produto
if(isset($_GET['del'])){

    $id = $_GET['del'];
    mysqli_query($db, "DELETE FROM produtos WHERE id = $id");

    #grava mensagem na sessao
    $_SESSION['message'] = "Produto removido!";
    header('location: produtos.php');
}
?>