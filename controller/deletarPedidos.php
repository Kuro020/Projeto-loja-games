<?php
include("../model/conexao.php");
include("../model/bancoPedido.php");
include("../view/header.php");
extract($_REQUEST,EXTR_OVERWRITE);
if(deletarPedidos($conexao,$codPed)){
    echo("Pedido deletado com sucesso.");
}else{
    echo("Pedido não deletado.");
}
include("../view/footer.php");
?>