<?php
include("../model/conexao.php");
include("../model/bancoFuncionario.php");
include("../view/header.php");
extract($_REQUEST,EXTR_OVERWRITE);
if(deletarFuncionarios($conexao,$codFunDeletar)){
    echo("Funcionario deletado com sucesso.");
}else{
    echo("Funcionario não deletado.");
}
include("../view/footer.php");
?>