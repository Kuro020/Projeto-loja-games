<?php
include("../model/conexao.php");
include("../model/bancoPedido.php");
include("../view/header.php");
extract($_REQUEST,EXTR_OVERWRITE);
if(inserirPedidos($conexao,$codCliFK,$codFunFK,$codJogFK,$totalJogoPed)){
    echo("Pedido cadastrado com sucesso.");
}else{
    echo("Pedido não cadastrado.");
}
include("../view/footer.php");
?>