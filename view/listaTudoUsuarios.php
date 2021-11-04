<?php
include_once("header.php");
include_once("../model/conexao.php");
include_once("../model/bancoJogos.php");
?>
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
        $usuarios = listaTudoUsuarios($conexao);
        foreach($usuarios as $usuario):
        ?>
        <tr>
            <th scope="row"><?=$usuario['codUsu']?></th>
            <td><?=$usuario['emailUsu']?></td>
            <td><?=$usuario['senhaUsu']?></td>
            <td><?=$usuario['pinUsu']?></td>
            <td>
                <form action="../controller/deletarUsuarios.php" method="POST">
                    <input type="hidden" name="codUsuDeletar" value="<?=$usuario['codUsu']?>">
                    <button type="submit" class="btn-small btn-danger">Deletar</button>
                </form>
            </td>
            <td>
                <form action="formAlterarUsuarios.php" method="POST">
                    <input type="hidden" name="codUsuAlterar" value="<?=$usuario['codUsu']?>">
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
include_once("footer.php");
?>