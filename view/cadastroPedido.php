<?php
include_once("header.php");
include_once("../model/bancoPedido.php");
include_once("../model/conexao.php");
include_once("../model/bancoFuncionario.php");

$codUsuFK = $_SESSION["codigoUsuario"];
$funcionario = listaBuscaFuncionarioUsuario($conexao,$codUsuFK);
?>
<form class="row g-3">
    <div class="col-md-3">
        <label for="inputCodFun" class="form-label">Código</label>
        <input type="text" value="<?php echo($funcionario["codFun"])?>" class="form-control" id="inputCodFun">
    </div>
    <div class="col-md-9">
        <label for="inputNomeFun" class="form-label">Funcionário</label>
        <input type="text" value="<?php echo($funcionario["nomeFun"])?>" class="form-control" id="inputNomeFun">
    </div>
    <div class="col-md-2">
        <label for="inputCodCli" class="form-label">Código</label>
        <input type="text" class="form-control" id="inputCodCli">
    </div>
    <div class="col-md-1">
        <label for="inputCodCli" class="form-label">Pesquisar</label>
        <button type="button" class="btn btn-success">Busca</button>
    </div>
    <div class="col-md-9">
        <label for="inputNomeCli" class="form-label">Cliente</label>
        <input type="text" class="form-control" id="inputNomeCli">
    </div>
    <div class="col-md-2">
        <label for="inputCodJog" class="form-label">Código</label>
        <input type="text" class="form-control" id="inputCodJog">
    </div>
    <div class="col-md-1">
        <label for="inputCodCli" class="form-label">Pesquisar</label>
        <button type="button" class="btn btn-success">Busca</button>
    </div>
    <div class="col-md-4">
        <label for="inputNomeJog" class="form-label">Jogo</label>
        <input type="text" class="form-control" id="inputNomeJog">
    </div>
    <div class="col-md-1">
        <label for="inputQtdJog" class="form-label">Quantidade</label>
        <select id="inputQtdJog" class="form-select">
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
        <input type="text" class="form-control" id="inputUnitario">
    </div>
    <div class="col-md-2">
        <label for="inputTotal" class="form-label">Valor Total</label>
        <input type="text" class="form-control" id="inputTotal">
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-success">Confirmar</button>
    </div>
</form>
<?php
include_once("footer.php");
?>