<?php
session_start();
if(!$_SESSION["emailUsuario"]){
    $_SESSION["msg"] = "<div class='alert alert-danger' role='alert'>Você não tem acesso a essa página.</div>";
    header("Location:../view/logar.php");
}else{
include_once("header.php");
include_once("../model/conexao.php");
include_once("../model/bancoCliente.php");
?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Código</th>
            <th scope="col">Nome</th>
            <th scope="col">CPF</th>
            <th scope="col">Telefone</th>
            <th scope="col">Data de Nascimento</th>
            <th scope="col">Deletar</th>
            <th scope="col">Alterar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $clientes = listaTudoClientes($conexao);
        foreach ($clientes as $cliente) :
        ?>
            <tr>
                <th scope="row"><?= $cliente['codCli'] ?></th>
                <td><?= $cliente['nomeCli'] ?></td>
                <td><?= $cliente['cpfCli'] ?></td>
                <td><?= $cliente['foneCli'] ?></td>
                <td><?= $cliente['datanasCli'] ?></td>
                <td>
                    <form action="../controller/deletarClientes.php" method="POST">
                        <input type="hidden" name="codCliDeletar" value="<?= $cliente['codCli'] ?>">
                        <button type="submit" class="btn-small btn-danger">Deletar</button>
                    </form>
                </td>
                <td>
                    <form action="formAlterarCliente.php" method="POST">
                        <input type="hidden" name="codCliAlterar" value="<?= $cliente['codCli'] ?>">
                        <button type="submit" class="btn-small btn-success">Alterar</button>
                    </form>
                </td>
            </tr>
        <?php
        endforeach;
        ?>

    </tbody>
</table>
<?php
include_once("footer.php");}
?>