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
<div class="card">
    <div class="card-body">
        <form class="row g-3" method="POST" action="../controller/alterarPedido.php">
        <?php 
        $codPed=$_POST['codPedAlterar'];
        $pedido=listaTudoPedidosCod($conexao,$codPed);
        ?>
            <p>Código <input type="number" name="codPed" value="<?=$pedido['codPed']?>" readonly></p>
            <p>Código do Funcionário<input type="number" name="codFunFK" value="<?=$pedido['codFunFK']?>" readonly></p>
            <p>Código do Cliente<input type="number" name="codCliFK" value="<?=$pedido['codCliFK']?>" readonly></p>
            <p>Código do Jogo<input type="number" name="codJogFK" value="<?=$pedido['codJogFK']?>" readonly></p>
            <p>Total<input type="text" name="totalJogoPed" value="<?=$pedido['totalJogoPed']?>"></p> 
            <button type="submit">Salvar</button>
        </form>
    </div>
</div>
<?php
include_once("footer.php");}
?>