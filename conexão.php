<?php
session_start();
# conecta com o BD 
    $server = 'localhost';
    $user = 'id17065395_jhon';
    $psw = 'ip!Xqhb*ro3|e]Cj';
    $dbase = 'id17065395_loja';
#msqli
    $db = mysqli_connect($server, $user, $psw, $dbase);
#pdo
    $dsn = "mysql:host=$server;dbname=$dbase";
    $connection = new PDO($dsn, $user, $psw);
?>