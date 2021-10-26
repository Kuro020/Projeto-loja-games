<?php
include_once("header.php");
include_once("../model/bancoJogos.php");
include_once("../model/conexao.php");
?>
<div class="container m-5 p-5">
    <form action="cadastroClientes.php" method="Post">
        <div class="row mb-3">
            <label for="inputCod" class="col-sm-2 col-form-label">Digite o Código do Usuario: </label>
            <div class="col-sm-3">
                <input type="number" name="codUsu" class="form-control" id="inputCod" required>
            </div>
            <div class="col-sm-3">
                <button type="submit" class="btn btn-dark">Buscar</button>
            </div>
        </div>
    </form>
</div>
<?php
$codUsu = isset($_POST['codUsu']) ? $_POST['codUsu'] : 0;
$usuario = listaTudoUsuariosCod($conexao, $codUsu);
if($usuario){


?>
<form method="POST" action="../controller/inserirClientes.php">
    <p>Código Clientes <input type="text" name="codUsu" value="<?=$codUsu?>"></p>    
    <p>Nome <input type="text" name="nomecli"></p>
    <p>CPF <input type="text" name="cpfcli"></p>
    <p>Telefone <input type="text" name="fonecli"></p>
    <p>Data de Nascimento <input type="date" name="datanascli"></p>
    <button type="submit">Salvar</button>
</form>
<?php
}
include_once("footer.php");
?>