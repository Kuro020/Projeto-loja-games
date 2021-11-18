<?php
session_start();
if(!$_SESSION["emailUsuario"]){
    $_SESSION["msg"] = "<div class='alert alert-danger' role='alert'>Você não tem acesso a essa página.</div>";
    header("Location:../view/logar.php");
}else{
include_once("header.php");
?>
<div class="card">
  <div class="card-body">
    <form method="POST" action="../controller/inserirJogos.php">
        <p>Jogo <input type="text" name="jogo"></p>
        <p>Tamanho do Jogo <input type="text" name="tamanho"></p>
        <p>Preço do Jogo <input type="text" name="preco"></p>
        <p>Requisitos do Jogo <input type="text" name="requisitos"></p>
        <p>Plataformas <input type="text" name="plataforma"></p>
        <p>Classificação <input type="text" name="classificacao"></p>
        <p>Avaliação <input type="text" name="avaliacao"></p>
        <button type="submit">Salvar</button>
    </div>
</form>
<?php
include_once("footer.php");}
?>