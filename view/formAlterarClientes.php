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
<form method="POST" action="../controller/alterarClientes.php">
<?php 
$codCli=$_POST['codCliAlterar'];
$cliente=listaTudoClientesCod($conexao,$codCli);
?>
    <p>Código <input type="text" name="codCli" value="<?=$cliente['codCli']?>"></p>
    <p>Código do Usuario<input type="text" name="codUsuFK" value="<?=$cliente['codUsuFK']?>"></p>
    <p>Nome<input type="text" name="nomeCli" value="<?=$cliente['nomeCli']?>"></p>
    <p>CPF<input type="text" name="cpfCli" value="<?=$cliente['cpfCli']?>"></p>
    <p>Telefone<input type="text" name="foneCli" value="<?=$cliente['foneCli']?>"></p>
    <p>Data de Nascimento<input type="date" name="datanasCli" value="<?=$cliente['datanasCli']?>"></p>
    <button type="submit">Salvar</button>
</form>
<?php
include_once("footer.php");}
?>