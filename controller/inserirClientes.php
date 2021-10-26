<?php
include("../model/conexao.php");
include("../model/bancoCliente.php");
include("../view/header.php");
extract($_REQUEST,EXTR_OVERWRITE);
if(inserirClientes($conexao,$codUsu,$nomecli,$cpfcli,$fonecli,$datanascli)){
    echo("Cliente cadastrado com sucesso.");
}else{
    echo("Cliente não cadastrado.");
}
include("../view/footer.php");
?>