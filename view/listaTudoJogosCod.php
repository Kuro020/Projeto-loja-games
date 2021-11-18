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
<div class="container m-5 p-5">
    <form action="listaTudoJogosCod.php" method="GET">
        <div class="row mb-3">
            <label for="inputCod" class="col-sm-2 col-form-label">Digite o Código do Jogo: </label>
            <div class="col-sm-3">
                <input type="number" name="codJog" class="form-control" id="inputCod" required>
            </div>
            <div class="col-sm-3">
                <button type="submit" class="btn btn-dark">Buscar</button>
            </div>
        </div>
    </form>
</div>
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
        $codJogo = isset($_GET['codJog']) ? $_GET['codJog'] : "0";
        if ($codJogo > 0) {
            $jogos = listaTudoJogosCod($conexao, $codJogo);
            if ($jogos) {
        ?>
                <tr>
                    <th scope="row"><?= $jogos['codJog'] ?></th>
                    <td><?= $jogos['nomeJog'] ?></td>
                    <td><?= $jogos['consoleJog'] ?></td>
                    <td><?= $jogos['precoJog'] ?></td>
                    <td>
                        <form action="../controller/deletarJogos.php" method="POST">
                            <input type="hidden" name="codJogDeletar" value="<?= $jogos['codJog'] ?>">
                            <button type="submit" class="btn-small btn-danger">Deletar</button>
                        </form>
                    </td>
                    <td>
                        <form action="formAlterarJogos.php" method="POST">
                            <input type="hidden" name="codJogAlterar" value="<?= $jogos['codJog'] ?>">
                            <button type="submit" class="btn-small btn-success">Alterar</button>
                        </form>
                    </td>
                </tr>
        <?php
            }
        }
        ?>

    </tbody>
</table>
<?php
include_once("footer.php");}
?>