<?php
include("../model/conexao.php");
include("../model/bancoFuncionario.php");
include("../view/header.php");
extract($_REQUEST,EXTR_OVERWRITE);
if(alterarFuncionarios($conexao,$codFun,$nomeFun,$funcaoFun,$foneFun,$datanasFun)){
    echo("Funcionario alterado com sucesso.");
}else{
    echo("Funcionario não alterado.");
}
include("../view/footer.php");
?>