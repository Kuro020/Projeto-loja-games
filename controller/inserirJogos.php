<?php
include("../model/conexao.php");
include("../model/bancoJogos.php");
include("../view/header.php");
extract($_REQUEST,EXTR_OVERWRITE);
if(inserirJogo($conexao,$jogo,$tamanho,$preco,$requisitos,$plataforma,$classificacao,$avaliacao)){
    echo("Jogo cadastrado com sucesso.");
}else{
    echo("Jogo não cadastrado.");
}
include("../view/footer.php");
?>