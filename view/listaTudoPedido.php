<?php
session_start();
if(!$_SESSION["emailUsuario"]){
    $_SESSION["msg"] = "<div class='alert alert-danger' role='alert'>Você não tem acesso a essa página.</div>";
    header("Location:../view/logar.php");
}else{
include_once("header.php");
include_once("../model/conexao.php");
include_once("../model/bancoPedido.php");
?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Código</th>
            <th scope="col">Código Funcionário</th>
            <th scope="col">Código Cliente</th>
            <th scope="col">Código Jogo</th>
            <th scope="col">Total</th>
            <th scope="col">Deletar</th>
            <th scope="col">Alterar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $pedidos = listaTudoPedidos($conexao);
        foreach ($pedidos as $pedido) :
        ?>
            <tr>
                <th scope="row"><?= $pedido['codPed'] ?></th>
                <td><?= $pedido['codFunFK'] ?></td>
                <td><?= $pedido['codCliFK'] ?></td>
                <td><?= $pedido['codJogFK'] ?></td>
                <td><?= $pedido['totalJogoPed'] ?></td>
                <td>
                    <form action="../controller/deletarPedidos.php" method="POST">
                        <input type="hidden" name="codPed" value="<?= $pedido['codPed'] ?>">
                        <button type="submit" class="btn-small btn-danger">Deletar</button>
                    </form>
                </td>
                <td>
                    <form action="formAlterarPedido.php" method="POST">
                        <input type="hidden" name="codPedAlterar" value="<?= $pedido['codPed'] ?>">
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