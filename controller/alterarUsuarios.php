<?php
include("../model/conexao.php");
include("../model/bancoJogos.php");
include("../view/header.php");
extract($_REQUEST,EXTR_OVERWRITE);
if(alterarUsuarios($conexao,$codUsu,$emailUsu,$senhaUsu,$pinUsu)){
    echo("Usuario alterado com sucesso.");
}else{
    echo("Usuario não alterado.");
}
include("../view/footer.php");
?>