<?php 
    function inserirFuncionario($conexao,$codUsuFK,$nomeFun,$funcaoFun,$foneFun,$datanasFun){

        $query="insert into tbfuncionarios(codUsuFK,nomeFun,funcaoFun,foneFun,datanasFun)values('{$codUsuFK}','{$nomeFun}','{$funcaoFun}','{$foneFun}','{$datanasFun}')";
        $resultados=mysqli_query($conexao,$query);
        return $resultados;
    }
    function listaTudoFuncionarios($conexao){
        $query="Select * From tbfuncionarios";
        $resultados=mysqli_query($conexao,$query);
        return $resultados;
    }
    function listaTudoFuncionariosCod($conexao,$codFun){
        $query="Select * from tbfuncionarios where codFun={$codFun}";
        $resultados=mysqli_query($conexao,$query);
        $resul=mysqli_fetch_array($resultados);
        return $resul;
    }
    function alterarFuncionarios($conexao,$codFun,$nomeFun,$funcaoFun,$foneFun,$datanasFun){
        $query="update tbfuncionarios set nomeFun='{$nomeFun}', funcaoFun='{$funcaoFun}', foneFun = '{$foneFun}', datanasFun = '{$datanasFun}' where codFun = '{$codFun}'";
        $resultados=mysqli_query($conexao,$query);
        return $resultados;
    }
    function deletarFuncionarios($conexao,$codFun){
        $query="delete from tbfuncionarios where codFun=$codFun";
        $resultados=mysqli_query($conexao,$query);
        return $resultados;
    }
    function listaTudoFuncionariosNome($conexao, $nomeFuncionario){
        $query = "select * from tbfuncionario where nomeFun like '%{$nomeFuncionario}%'";
        $resultados=mysqli_query($conexao,$query);
        return $resultados;
    }
?>