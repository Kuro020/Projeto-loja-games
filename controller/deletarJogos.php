<?php
include("../model/conexao.php");
include("../model/bancoJogos.php");
include("../view/header.php");
extract($_REQUEST,EXTR_OVERWRITE);
if(deletarJogos($conexao,$codJogDeletar)){
    echo("Jogo deletado com sucesso.");
}else{
    echo("Jogo não deletado.");
}
include("../view/footer.php");
?>