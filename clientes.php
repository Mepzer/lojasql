<?php
include("crudcli.php");
if (!isset($_SESSION['loginok']))
{
    header("Location: login.php");
    die();
}
#recuperando o registro para edicao
if(isset($_GET['edit'])){
    $idcli = $_GET['edit'];
    $update = true;
    $record = mysqli_query($db, "SELECT * FROM clientes WHERE idcli=$idcli");
    
    // #testa o retorno do select e cria o vetor com os registros trazidos
    // #if(count($record) == 1) {
    // echo "<pre>" . print_r($record) . "</pre>";
    // echo $idcli;
    if($record){
         $n = mysqli_fetch_array($record);
         $nomecli = $n['nomecli'];
         $endercli = $n['endercli'];
         $fonecli = $n['fonecli'];
         $emailcli = $n['emailcli']; 
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Clientes</title>
    <link rel="stylesheet" type="text/css" href="css/css.css">
</head>

<body>

    <!-- testa se a sessão existe e exibe sua mensagem -->
    <?php if(isset($_SESSION['message'])) : ?>
        <div class="msg">
            <?php
                #exibe mensagem da sessao
                echo $_SESSION['message'];
                #apaga a sessao
                unset($_SESSION['message']);
                ?>
        </div>
    <?php endif?>
    <!-- ------------------------------------------------- -->

    <!-- recupera os registros do banco de dados e exibe na página -->
    <?php $results = mysqli_query($db, "SELECT * FROM clientes"); ?>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Fone</th>
                <th colspan="2">Email</th>
            </tr>
        </thead>
        <!-- cria o vetor com os registros trazidos do select -->
        <!-- Início while -->
        <?php while ($rs = mysqli_fetch_array($results)) { ?>
            <tr>
            <td><?php echo $rs['idcli']?>
            <td><?php echo $rs['nomecli'] ?></td>
            <td><?php echo $rs['fonecli'] ?></td>
            <td><?php echo $rs['emailcli'] ?></td>
            <td>
                <a href="clientes.php?edit=<?php echo $rs['idcli']; ?>" class="edit_btn">Alterar</a>
            </td>
            <td>
                <a href="crudcli.php?del=<?php echo $rs['idcli']; ?>" class="del_btn">Remover</a>
            </td>
            </tr>
        <?php } ?>
        <!-- Fim while -->
    </table>
    <!-- ------------------------------------------------------------ -->

    <form method="post" action="crudcli.php">
        <!-- campo oculto - contem o id do registro que vai ser atualiado -->
        <input type="hidden" name="idcli" value="<?php echo $idcli; ?>">

        <div class="input-group">
            <label>Nome</label>
            <input type="text" name="nomecli" value="<?php echo $nomecli; ?>">
        </div>
        <div class="input-group">
            <label>Endereço</label>
            <input type="text" name="endercli" value="<?php echo $endercli; ?>">
        </div>
        <div class="input-group">
            <label>Telefone</label>
            <input type="text" name="fonecli" value="<?php echo $fonecli; ?>">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="text" name="emailcli" value="<?php echo $emailcli; ?>">
        </div>
        <div class="input-group">
            <!-- <button class="btn" type="submit" name="adiciona">Adicionar</button> -->
            <?php if ($update == true) : ?>
            <button class="btn" type="submit" name="altera" style="background: #556B2F;">Alterar</button>
            <button class="btn" type="submit" name="voltar">Voltar</button>
            <?php else : ?>
            <button class="btn" type="submit" name="adiciona">Adicionar</button>
            <button class="btn" type="submit" name="voltar">Voltar</button>
            <?php endif ?>
        </div>
    </form>
</body>

</html>