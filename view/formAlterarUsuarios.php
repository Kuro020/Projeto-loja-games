<?php
include_once("header.php");
include_once("../model/conexao.php");
include_once("../model/bancoJogos.php");
?>
<form method="POST" action="../controller/alterarUsuarios.php">
<?php 
$codUsu=$_POST['codUsuAlterar'];
$usuario=listaTudoUsuariosCod($conexao,$codUsu);
?>
    <p>Código <input type="text" name="codUsu" value="<?=$usuario['codUsu']?>"></p>
    <p>Email <input type="text" name="emailUsu" value="<?=$usuario['emailUsu']?>"></p>
    <p>Senha <input type="text" name="senhaUsu" value="<?=$usuario['senhaUsu']?>"></p>
    <p>PIN <input type="text" name="pinUsu" value="<?=$usuario['pinUsu']?>"></p>
    <button type="submit">Salvar</button>
</form>
<?php
include_once("footer.php");
?>