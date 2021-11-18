<?php
session_start();
if(!$_SESSION["emailUsuario"]){
    $_SESSION["msg"] = "<div class='alert alert-danger' role='alert'>Você não tem acesso a essa página.</div>";
    header("Location:../view/logar.php");
}else{
include_once("header.php");
include_once("../model/conexao.php");
include_once("../model/bancoJogos.php");
?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Código</th>
            <th scope="col">Jogo</th>
            <th scope="col">Plataforma</th>
            <th scope="col">Preço</th>
            <th scope="col">Deletar</th>
            <th scope="col">Alterar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $jogos = listaTudoJogos($conexao);
        foreach($jogos as $jogo):
        ?>
        <tr>
            <th scope="row"><?=$jogo['codJog']?></th>
            <td><?=$jogo['nomeJog']?></td>
            <td><?=$jogo['consoleJog']?></td>
            <td><?=$jogo['precoJog']?></td>
            <td>
                <form action="../controller/deletarJogos.php" method="POST">
                    <input type="hidden" name="codJogDeletar" value="<?=$jogo['codJog']?>">
                    <button type="submit" class="btn-small btn-danger">Deletar</button>
                </form>
            </td>
            <td>
                <form action="formAlterarJogos.php" method="POST">
                    <input type="hidden" name="codJogAlterar" value="<?=$jogo['codJog']?>">
                    <button type="submit" class="btn-small btn-success">Alterar</button>
                </form>
            </td>
        </tr>
        <?php
        endforeach;
        ?>
        
    </tbody>
    </table>
<?php
include_once("footer.php");}
?>