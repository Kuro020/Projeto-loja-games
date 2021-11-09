<?php
include_once("header.php");
include_once("../model/conexao.php");
include_once("../model/bancoFuncionario.php");
?>
<form method="POST" action="../controller/alterarFuncionarios.php">
<?php 
$codFun=$_POST['codFunAlterar'];
$funcionario=listaTudoFuncionariosCod($conexao,$codFun);
$codUsu=$funcionario['codUsuFK'];
$usuario=listaFuncionarioUsuario($conexao,$codUsu);
?>
    <p>Código <input type="text" name="codFun" value="<?=$funcionario['codFun']?>"></p>
    <p>Código do Usuário<input type="number" name="codUsuFK" value="<?=$funcionario['codUsuFK']?>" readonly></p>
    <p>Email <input type= "text" name="emailUsu" value="<?=$usuario['emailUsu']?>" readonly></p>
    <p>Nome <input type="text" name="nomeFun" value="<?=$funcionario['nomeFun']?>"></p>
    <p>Função <input type="text" name="funcaoFun" value="<?=$funcionario['funcaoFun']?>"></p>
    <p>Telefone <input type="text" name="foneFun" value="<?=$funcionario['foneFun']?>"></p>
    <p>Data de Nascimento <input type="date" name="datanasFun" value="<?=$funcionario['datanasFun']?>"></p>
    <button type="submit">Salvar</button>
</form>
<?php
include_once("footer.php");
?>