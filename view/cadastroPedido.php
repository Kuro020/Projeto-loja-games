<?php
include_once("header.php");
include_once("../model/bancoPedido.php");
include_once("../model/conexao.php");
include_once("../model/bancoFuncionario.php");
include_once("../model/bancoCliente.php");
include_once("../model/bancoJogos.php");

$codUsuFK = $_SESSION["codigoUsuario"];
$funcionario = listaBuscaFuncionarioUsuario($conexao, $codUsuFK);
?>
<div class="row g-3">
    <div class="col-md-3">
        <label for="inputCodFun" class="form-label">Código</label>
        <input type="text" value="<?php echo ($funcionario["codFun"]) ?>" class="form-control" id="inputCodFun">
    </div>
    <div class="col-md-9">
        <label for="inputNomeFun" class="form-label">Funcionário</label>
        <input type="text" value="<?php echo ($funcionario["nomeFun"]) ?>" class="form-control" id="inputNomeFun">
    </div>
    <?php
    $codCliente = isset($_POST["codCliente"]) ? $_POST["codCliente"] : 0;
    $clientes = isset($codCliente) ? listaTudoClientesCod($conexao, $codCliente) : "";
    $_SESSION["codigoCliente"] = isset($_POST["codCliente"]) ? $_POST["codCliente"] : "0";
    $_SESSION["nomeCliente"] = isset($clientes["nomeCli"]) ? $clientes["nomeCli"] : "";
    ?>
    <div class="col-md-3">
        <label for="inputCodCli" required class="form-label">Código</label>
        <form method="post" action="cadastroPedido.php">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <input type="text" class="form-control" value="<?= $_SESSION["codigoCliente"] ?>" id="inputCodCli" required name="codCliente">
                <button class="btn btn-success me-md-2" type="submit">Pesquisar</button>
            </div>
        </form>
    </div>
    <?php
 
    ?>
    <div class="col-md-9">
        <label for="inputNomeCli" class="form-label">Cliente</label>
        <input type="text" value="<?= $_SESSION["nomeCliente"] ?>" class="form-control" id="inputNomeCli">
    </div>
    <?php
    $codJogo = isset($_POST["codJogo"]) ? $_POST["codJogo"] : "0";
    ?>
    <div class="col-md-3">
        <label for="inputCodJog" class="form-label">Código</label>
        <form method="post" action="cadastroPedido.php">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <input type="text" class="form-control" value="<?= $codJogo ?>" id="inputCodJog" required name="codJogo">
                <input type="hidden" value="<?=$_SESSION['codigoCliente']?>" name="codCliente">
                <input type="hidden" value="<?=$_SESSION['nomeCliente']?>" name="nomeCliente">
                <button class="btn btn-success me-md-2" type="submit">Pesquisar</button>
            </div>
        </form>
    </div>
    <?php
    $jogos = isset($codJogo) ? listaTudoJogosCod($conexao, $codJogo) : "";
    $_SESSION["codigoJogo"] = isset($_POST["codJogo"]) ? $_POST["codJogo"] : "0";
    ?>
    <div class="col-md-4">
        <label for="inputNomeJog" class="form-label">Jogo</label>
        <input type="text" value="<?= $jogos['nomeJog'] ?>" class="form-control" id="inputNomeJog">
    </div>
    <div class="col-md-1">
        <label for="inputQtdJog" class="form-label">Quantidade</label>
        <select id="inputQtdJog" class="form-select" onchange="Quantidadejogo(this.value)">
            <option selected>Escolha...</option>
            <option value=1>1</option>
            <option value=2>2</option>
            <option value=3>3</option>
            <option value=4>4</option>
            <option value=5>5</option>
        </select>
    </div>
    <div class="col-md-2">
        <label for="inputUnitario" class="form-label">Valor Unitário</label>
        <input type="text" value="<?= $jogos['precoJog'] ?>" class="form-control" id="inputUnitario">
    </div>
    <div class="col-md-2">
        <label for="inputTotal" class="form-label">Valor Total</label>
        <input type="text" class="form-control" id="inputTotal">
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-success">Confirmar</button>
    </div>
</div>

<script>
    function Quantidadejogo(inputQtdJog){
        alert(doSomething(inputQtdJog));
    }
</script>
<?php
include_once("footer.php");
?>