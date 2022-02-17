<?php 

include("conexão.php"); 

#inicializa variaveis 
$id = 0;
$nomecli = "";
$endercli = "";
$fonecli = "";
$emailcli = ""; 
$update = false;

#voltar inicial
if(isset($_POST['voltar'])){
    //Fechando conexão com o banco de dados
    mysqli_close($db);
    header('location: inicio.php');  
}

#adiciona Cliente
if(isset($_POST['adiciona'])){

    $nomecli = $_POST['nomecli'];
    $endercli = $_POST['endercli'];
    $fonecli = $_POST['fonecli'];
    $emailcli = $_POST['emailcli']; 
    //Verificação de campos vazios
    if($nomecli == ''|| $endercli == ''|| $fonecli == ''|| $emailcli == ''){
        $_SESSION['message'] = "Preencha os campos corretamente!";    
        header('location: clientes.php');    
    }else{
        mysqli_query($db, "INSERT INTO clientes(nomecli, endercli, fonecli, emailcli) VALUES ('$nomecli', '$endercli','$fonecli','$emailcli')");
        #grava mensagem na sessao
        $_SESSION['message'] = "Cliente adicionado!";
        header('location: clientes.php');    
    }
    
}

#altera Cliente
if(isset($_POST['altera'])){
    
    $idcli = $_POST['idcli'];
    $nomecli = $_POST['nomecli'];
    $endercli = $_POST['endercli'];
    $fonecli = $_POST['fonecli'];
    $emailcli = $_POST['emailcli']; 
    //Verificação de campos vazios
    if($nomecli == ''|| $endercli == ''|| $fonecli == ''|| $emailcli == ''){
        $_SESSION['message'] = "Preencha os campos corretamente!";    
        header('location: clientes.php');  
    }else{
        mysqli_query($db, "UPDATE clientes SET nomecli = '$nomecli', endercli = '$endercli', fonecli = '$fonecli', emailcli = '$emailcli' WHERE idcli = $idcli");

        #grava mensagem na sessao
        $_SESSION['message'] = "Cliente alterado!";
        header('location: clientes.php');    
    }
    
}

#remove Cliente
if(isset($_GET['del'])){

    $idcli = $_GET['del'];
    mysqli_query($db, "DELETE FROM clientes WHERE idcli = $idcli");

    #grava mensagem na sessao
    $_SESSION['message'] = "Cliente removido!";
    header('location: clientes.php');
}
