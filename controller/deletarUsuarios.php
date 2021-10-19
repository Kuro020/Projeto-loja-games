<?php
include("../model/conexao.php");
include("../model/bancoJogos.php");
include("../view/header.php");
extract($_REQUEST,EXTR_OVERWRITE);
if(deletarUsuarios($conexao,$codUsuDeletar)){
    echo("Usuario deletado com sucesso.");
}else{
    echo("Usuario não deletado.");
}
include("../view/footer.php");
?>