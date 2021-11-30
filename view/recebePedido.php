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
<?php
$quant = $_GET["Quantidade"];
$unit = $_GET["Valor"];
$total = $quant * $unit;
$codFunFK = $_GET["codFuncionario"];
$codJogFK = $_GET["codJogo"];
$codCliFK = $_GET["codCliente"];
?>
<form method="POST" action="../controller/inserirPedido.php">
    <div class="col-md-2">
        <label for="inputTotal" class="form-label">Valor Total</label>
        <input type="text" class="form-control" value="<?php echo ("R$$total") ?>" id="inputTotal">
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-success">Confirmar</button>
    </div>
</form>