<?php

include("../models/conexao.php");
include("../models/bancoJogos.php");
include("../views/header.php");

extract($_REQUEST,EXTR_OVERWRITE);

if(inserirJogo($conexao,$jogo,$tamanho,$preco,$requisitos,$console,$classificacao,$avaliacao)){
    echo("Jogo cadastrado com sucesso");
}else{
    echo("Jogo não cadastrado.");
}

include("../views/footer.php");