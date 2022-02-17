<?php
include("crud.php");
if (!isset($_SESSION['loginok']))
{
    header("Location: login.php");
    die();
}
#recuperando o registro para edicao
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($db, "SELECT * FROM produtos WHERE id=$id");
    
    #testa o retorno do select e cria o vetorcom os registros trazidos
    #if(count($record) == 1) {
    if($record){
        $n = mysqli_fetch_array($record);
        $nome = $n['nome'];
        $descricao = $n['descricao'];
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
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
    <?php $results = mysqli_query($db, "SELECT * FROM produtos"); ?>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th colspan="2">Ação</th>
            </tr>
        </thead>
        <!-- cria o vetor com os registros trazidos do select -->
        <!-- Início while -->
        <?php while ($rs = mysqli_fetch_array($results)) { ?>
            <tr>
            <td><?php echo $rs['id']?>
            <td><?php echo $rs['nome'] ?></td>
            <td><?php echo $rs['descricao'] ?></td>
            <td>
                <a href="produtos.php?edit=<?php echo $rs['id']; ?>" class="edit_btn">Alterar</a>
            </td>
            <td>
                <a href="crud.php?del=<?php echo $rs['id']; ?>" class="del_btn">Remover</a>
            </td>
            </tr>
        <?php } ?>
        <!-- Fim while -->
    </table>
    <!-- ------------------------------------------------------------ -->

    <form method="post" action="crud.php">
        <!-- campo oculto - contem o id do registro que vai ser atualiado -->
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <div class="input-group">
            <label>Produto</label>
            <!-- <input type="text" name="nome" value=""> -->
            <input type="text" name="nome" value="<?php echo $nome; ?>">
        </div>
        <div class="input-group">
            <label>Descrição</label>
            <!-- <input type="text" name="descricao" value=""> -->
            <input type="text" name="descricao" value="<?php echo $descricao; ?>">
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