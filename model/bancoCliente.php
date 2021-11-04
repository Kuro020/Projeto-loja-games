<?php 
    function inserirClientes($conexao,$codUsuFK,$nomeCli,$cpfCli,$foneCli,$datanasCli){

        $query="insert into tbclientes(codUsuFK,nomeCli,cpfCli,foneCli,datanasCli)values('{$codUsuFK}','{$nomeCli}','{$cpfCli}','{$foneCli}','{$datanasCli}')";
        $resultados=mysqli_query($conexao,$query);
        return $resultados;
    }
    function listaTudoClientes($conexao){
        $query="Select * From tbclientes";
        $resultados=mysqli_query($conexao,$query);
        return $resultados;
    }
    function listaTudoClientesCod($conexao,$codCli){
        $query="Select * from tbclientes where codCli={$codCli}";
        $resultados=mysqli_query($conexao,$query);
        $resul=mysqli_fetch_array($resultados);
        return $resul;
    }

    function listaClienteUsuario($conexao,$codUsu){
        $query="Select * from tbusuarios where codUsu={$codUsu}";
        $resultados=mysqli_query($conexao,$query);
        $resul=mysqli_fetch_array($resultados);
        return $resul;
    }

    function alterarClientes($conexao,$codCli,$nomeCli,$cpfCli,$foneCli,$datanasCli){
        $query="update tbclientes set nomeCli='{$nomeCli}', cpfCli='{$cpfCli}', foneCli = '{$foneCli}', datanasCli = '{$datanasCli}' where codCli = '{$codCli}'";
        $resultados=mysqli_query($conexao,$query);
        return $resultados;
    }
    function deletarClientes($conexao,$codCli){
        $query="delete from tbclientes where codCli=$codCli";
        $resultados=mysqli_query($conexao,$query);
        return $resultados;
    }
    function listaTudoClientesNome($conexao, $nomeCliente){
        $query = "select * from tbclientes where nomeCli like '%{$nomeCliente}%'";
        $resultados=mysqli_query($conexao,$query);
        return $resultados;
    }
?>