<?php
session_start();
include_once("../model/bancoJogos.php");
include_once("../model/conexao.php");

$email = $_POST["email"];
$senha = $_POST["senha"];
$acesso = buscarAcesso($conexao,$email,$senha);

if($email === $acesso){
    header("Location:../view/index.php");
}else{
    $_SESSION["msg"] = "<div class='alert alert-danger' role='alert'>Os dados não conferem, tente novamente.</div>";
    header("Location:../view/logar.php");
}

?>