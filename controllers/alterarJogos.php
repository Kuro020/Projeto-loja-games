<?php

include("../models/conexao.php");
include("../models/bancoJogos.php");
include("../views/header.php");

extract($_REQUEST,EXTR_OVERWRITE);

if(alterarjogos($conexao,$codigo, $jogo,$tamanho,$preco,$requisitos,$console,$classificacao,$avaliacao)){
    echo("Jogo alterado com sucesso");
}else{
    echo("Jogo não alterado.");
}

include("../views/footer.php");