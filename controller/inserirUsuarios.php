<?php
include("../model/conexao.php");
include("../model/bancoJogos.php");
include("../view/header.php");
extract($_REQUEST,EXTR_OVERWRITE);
if(inserirUsuarios($conexao,$email,$senha,$pin)){
    echo("Usuario cadastrado com sucesso.");
}else{
    echo("Usuario não cadastrado.");
}
include("../view/footer.php");
?>