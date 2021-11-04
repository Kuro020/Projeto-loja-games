<?php
include("../model/conexao.php");
include("../model/bancoFuncionario.php");
include("../view/header.php");
extract($_REQUEST,EXTR_OVERWRITE);
if(inserirFuncionario($conexao,$codUsu,$nomeFun,$funcaoFun,$foneFun,$datanasFun)){
    echo("Funcionario cadastrado com sucesso.");
}else{
    echo("Funcionario não cadastrado.");
}
include("../view/footer.php");
?>