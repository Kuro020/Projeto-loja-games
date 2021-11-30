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
<div class="container m-5 p-5">
    <form action="listaTudoPedidoCod.php" method="GET">
        <div class="row mb-3">
            <label for="inputCod" class="col-sm-2 col-form-label">Digite o Código do Pedido: </label>
            <div class="col-sm-3">
                <input type="number" name="codPed" class="form-control" id="inputCod" required>
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
        $codPedido = isset($_GET['codPed']) ? $_GET['codPed'] : "0";
        if ($codPedido > 0) {
            $pedidos = listaTudoPedidosCod($conexao, $codPedido);
            if ($pedidos) {
        ?>
                <tr>
                    <th scope="row"><?= $pedidos['codPed'] ?></th>
                    <td><?= $pedidos['codFunFK'] ?></td>
                    <td><?= $pedidos['codCliFK'] ?></td>
                    <td><?= $pedidos['codJogFK'] ?></td>
                    <td><?= $pedidos['totalJogoPed'] ?></td>
                    <td>
                        <form action="../controller/deletarPedidos.php" method="POST">
                            <input type="hidden" name="codPedDeletar" value="<?= $pedidos['codPed'] ?>">
                            <button type="submit" class="btn-small btn-danger">Deletar</button>
                        </form>
                    </td>
                    <td>
                        <form action="formAlterarPedidos.php" method="POST">
                            <input type="hidden" name="codPedAlterar" value="<?= $pedidos['codPed'] ?>">
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