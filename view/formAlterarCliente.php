<?php
session_start();
if(!$_SESSION["emailUsuario"]){
    $_SESSION["msg"] = "<div class='alert alert-danger' role='alert'>Você não tem acesso a essa página.</div>";
    header("Location:../view/logar.php");
}else{
include_once("header.php");
include_once("../model/conexao.php");
include_once("../model/bancoCliente.php");
?>
<div class="card">
    <div class="card-body">
        <form class="row g-3" method="POST" action="../controller/alterarClientes.php">
        <?php 
        $codCli=$_POST['codCliAlterar'];
        $cliente=listaTudoClientesCod($conexao,$codCli);
        $codUsu=$cliente['codUsuFK'];
        $usuario=listaClienteUsuario($conexao,$codUsu);
        ?>
            <p>Código <input type="number" name="codCli" value="<?=$cliente['codCli']?>" readonly></p>
            <p>Código do Usuário<input type="number" name="codUsuFK" value="<?=$cliente['codUsuFK']?>" readonly></p>
            <p>Email <input type= "text" name="emailUsu" value="<?=$usuario['emailUsu']?>" readonly></p>
            <p>Nome<input type="text" name="nomeCli" value="<?=$cliente['nomeCli']?>"></p>
            <p>CPF<input type="text" name="cpfCli" value="<?=$cliente['cpfCli']?>"></p>
            <p>Telefone<input type="text" name="foneCli" value="<?=$cliente['foneCli']?>"></p>
            <p>Data de Nascimento<input type="date" name="datanasCli" value="<?=$cliente['datanasCli']?>"></p>
            <button type="submit">Salvar</button>
        </form>
    </div>
</div>
        <?php
include_once("footer.php");}
?>