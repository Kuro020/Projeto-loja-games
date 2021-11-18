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
<div class="card">
  <div class="card-body">
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
    </div>
</div>
<?php
include_once("footer.php");}
?>