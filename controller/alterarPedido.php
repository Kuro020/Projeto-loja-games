<?php
include("../model/conexao.php");
include("../model/bancoPedido.php");
include("../view/header.php");
extract($_REQUEST,EXTR_OVERWRITE);
if(alterarPedidos($conexao,$codPed,$codCliFK,$codFunFK,$codJogFK,$totalJogoPed)){
    echo("Pedido alterado com sucesso.");
}else{
    echo("Pedido não alterado.");
}
include("../view/footer.php");
?>