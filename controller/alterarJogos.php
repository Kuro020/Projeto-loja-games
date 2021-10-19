<?php
include("../model/conexao.php");
include("../model/bancoJogos.php");
include("../view/header.php");
extract($_REQUEST,EXTR_OVERWRITE);
if(alterarJogos($conexao,$codJog,$nomeJog,$tamanhoJog,$precoJog,$requisitosJog,$consoleJog,$classificacaoJog,$avaliacaoJog)){
    echo("Jogo alterado com sucesso.");
}else{
    echo("Jogo não alterado.");
}
include("../view/footer.php");
?>