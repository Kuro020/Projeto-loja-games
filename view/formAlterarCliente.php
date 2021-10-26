<?php
include_once("header.php");
include_once("../model/conexao.php");
include_once("../model/bancoCliente.php");
?>
<form method="POST" action="../controller/alterarClientes.php">
<?php 
$codCli=$_POST['codCliAlterar'];
$cliente=listaTudoClientesCod($conexao,$codCli);
?>
    <p>Código <input type="text" name="codCli" value="<?=$cliente['codCli']?>"></p>
    <p>Nome <input type="text" name="nomeCli" value="<?=$cliente['nomeCli']?>"></p>
    <p>CPF <input type="text" name="cpfCli" value="<?=$cliente['cpfCli']?>"></p>
    <p>Telefone <input type="text" name="foneCli" value="<?=$cliente['foneCli']?>"></p>
    <p>Data de Nascimento <input type="date" name="datanasCli" value="<?=$cliente['datanasCli']?>"></p>
    <button type="submit">Salvar</button>
</form>
<?php
include_once("footer.php");
?>