<?php
function inserirJogo($conexao, $jogo, $tamanho, $preco, $requisitos, $plataforma, $classificacao, $avaliacao)
{
    $query = "insert into tbjogos(nomeJog,tamanhoJog,precoJog,requisitosJog,consoleJog,classificacaoJog,avaliacaoJog)values('{$jogo}','{$tamanho}','{$preco}','{$requisitos}','{$plataforma}','{$classificacao}','{$avaliacao}')";
    $resultados = mysqli_query($conexao, $query);
    return $resultados;
}
function listaTudoJogos($conexao)
{
    $query = "Select * From tbjogos";
    $resultados = mysqli_query($conexao, $query);
    return $resultados;
}
function listaTudoJogosCod($conexao, $codJogo)
{
    $query = "Select * from tbjogos where codJog={$codJogo}";
    $resultados = mysqli_query($conexao, $query);
    $resul = mysqli_fetch_array($resultados);
    return $resul;
}
function alterarJogos($conexao, $codJog, $nomeJog, $tamanhoJog, $precoJog, $requisitosJog, $consoleJog, $classificacaoJog, $avaliacaoJog)
{
    $query = "update tbjogos set nomeJog='{$nomeJog}', tamanhoJog='{$tamanhoJog}', precoJog='{$precoJog}', requisitosJog='{$requisitosJog}', consoleJog='{$consoleJog}', classificacaoJog='{$classificacaoJog}', avaliacaoJog='{$avaliacaoJog}' where codJog = '{$codJog}'";
    $resultados = mysqli_query($conexao, $query);
    return $resultados;
}
function deletarJogos($conexao, $codJog)
{
    $query = "delete from tbjogos where codJog=$codJog";
    $resultados = mysqli_query($conexao, $query);
    return $resultados;
}
function inserirUsuarios($conexao, $email, $senha, $pin)
{
    $option = ['cost' => 8];
    $senhacrypto = password_hash($senha, PASSWORD_BCRYPT, $option);

    $query = "insert into tbusuarios(emailUsu,senhaUsu,pinUsu)values('{$email}','{$senhacrypto}','{$pin}')";
    $resultados = mysqli_query($conexao, $query);
    return $resultados;
}
function listaTudoUsuarios($conexao)
{
    $query = "Select * From tbusuarios";
    $resultados = mysqli_query($conexao, $query);
    return $resultados;
}
function listaTudoUsuariosCod($conexao, $codUsu)
{
    $query = "Select * from tbusuarios where codUsu={$codUsu}";
    $resultados = mysqli_query($conexao, $query);
    $resul = mysqli_fetch_array($resultados);
    return $resul;
}
function alterarUsuarios($conexao, $codUsu, $emailUsu, $senhaUsu, $pinUsu)
{
    $option = ['cost' => 8];
    $senhacrypto = password_hash($senhaUsu, PASSWORD_BCRYPT, $option);

    $query = "update tbusuarios set emailUsu='{$emailUsu}', senhaUsu='{$senhacrypto}', pinUsu = '{$pinUsu}' where codUsu = '{$codUsu}'";
    $resultados = mysqli_query($conexao, $query);
    return $resultados;
}
function deletarUsuarios($conexao, $codUsu)
{
    $query = "delete from tbusuarios where codUsu=$codUsu";
    $resultados = mysqli_query($conexao, $query);
    return $resultados;
}
function buscarAcesso($conexao, $email, $senha)
{
    $query = "select * from tbusuarios where emailUsu='{$email}'";
    $resultados = mysqli_query($conexao, $query);

    if (mysqli_num_rows($resultados) > 0) {
        $linha = mysqli_fetch_assoc($resultados);

        if (password_verify($senha, $linha["senhaUsu"])) {
            $_SESSION["emailUsuario"] = $linha["emailUsu"];
            $_SESSION["codigoUsuario"] = $linha["codUsu"];

            return $linha["emailUsu"];
        } else {
            return "Senha não confere";
        }
    } else {
        return "Email não cadastrado";
    }
}
