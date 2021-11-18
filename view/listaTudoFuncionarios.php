<?php
session_start();
if(!$_SESSION["emailUsuario"]){
    $_SESSION["msg"] = "<div class='alert alert-danger' role='alert'>Você não tem acesso a essa página.</div>";
    header("Location:../view/logar.php");
}else{
include_once("header.php");
include_once("../model/conexao.php");
include_once("../model/bancoFuncionario.php");
?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Código</th>
            <th scope="col">Nome</th>
            <th scope="col">Função</th>
            <th scope="col">Telefone</th>
            <th scope="col">Data de Nascimento</th>
            <th scope="col">Deletar</th>
            <th scope="col">Alterar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $funcionarios = listaTudoFuncionarios($conexao);
        foreach ($funcionarios as $funcionario) :
        ?>
            <tr>
                <th scope="row"><?= $funcionario['codFun'] ?></th>
                <td><?= $funcionario['nomeFun'] ?></td>
                <td><?= $funcionario['funcaoFun'] ?></td>
                <td><?= $funcionario['foneFun'] ?></td>
                <td><?= $funcionario['datanasFun'] ?></td>
                <td>
                    <form action="../controller/deletarFuncionarios.php" method="POST">
                        <input type="hidden" name="codFunDeletar" value="<?= $funcionario['codFun'] ?>">
                        <button type="submit" class="btn-small btn-danger">Deletar</button>
                    </form>
                </td>
                <td>
                    <form action="formAlterarFuncionarios.php" method="POST">
                        <input type="hidden" name="codFunAlterar" value="<?= $funcionario['codFun'] ?>">
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