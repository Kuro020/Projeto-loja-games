<?php
session_start();
if(!$_SESSION["emailUsuario"]){
    $_SESSION["msg"] = "<div class='alert alert-danger' role='alert'>Você não tem acesso a essa página.</div>";
    header("Location:../view/logar.php");
}else{
include_once("header.php");
include_once("../model/conexao.php");
include_once("../model/bancoJogos.php");
?>
<div class="container m-5 p-5">
    <form action="listaTudoUsuariosCod.php" method="GET">
        <div class="row mb-3">
            <label for="inputCod" class="col-sm-2 col-form-label">Digite o Código do Usuario: </label>
            <div class="col-sm-3">
                <input type="number" name="codUsu" class="form-control" id="inputCod" required>
            </div>
            <div class="col-sm-3">
                <button type="submit" class="btn btn-dark">Buscar</button>
            </div>
        </div>
    </form>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Código</th>
            <th scope="col">Email</th>
            <th scope="col">Senha</th>
            <th scope="col">PIN</th>
            <th scope="col">Deletar</th>
            <th scope="col">Alterar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $codUsu = isset($_GET['codUsu']) ? $_GET['codUsu'] : "0";
        if ($codUsu > 0) {
            $usuarios = listaTudoUsuariosCod($conexao, $codUsu);
            if ($usuarios) {


        ?>
                <tr>
                    <th scope="row"><?= $usuarios['codUsu'] ?></th>
                    <td><?= $usuarios['emailUsu'] ?></td>
                    <td><?= $usuarios['senhaUsu'] ?></td>
                    <td><?= $usuarios['pinUsu'] ?></td>
                    <td>
                        <form action="../controller/deletarUsuarios.php" method="POST">
                            <input type="hidden" name="codUsuDeletar" value="<?= $usuarios['codUsu'] ?>">
                            <button type="submit" class="btn-small btn-danger">Deletar</button>
                        </form>
                    </td>
                    <td>
                        <form action="formAlterarUsuarios.php" method="POST">
                            <input type="hidden" name="codUsuAlterar" value="<?= $usuarios['codUsu'] ?>">
                            <button type="submit" class="btn-small btn-success">Alterar</button>
                        </form>
                    </td>
                </tr>
        <?php
            }
        }
        ?>

    </tbody>
</table>
<?php
include_once("footer.php");}
?>