<?php
    include_once("header.php");
    include_once("../models/conexao.php");
    include_once("../models/bancoJogos.php");
    
?>  
    <form method="Post" action="../controllers/alterarJogos.php">
<?php
$codJogo = $_POST["codJogalterar"];

$jogo = listaTudoJogosCod($conexao,$codJogo);

?>
        <p>Código <input type="text" name="codigo" value="<?=$jogo['codJog'] ?>"></p>
        <p>Jogo <input type="text" name="jogo" value="<?=$jogo['nomeJog'] ?>"></p>
        <p>Tamanho do jogo<input type="text" name="tamanho" value="<?=$jogo['tamanhoJog'] ?>"></p>
        <p>Preço <input type="text" name="preco" value="<?=$jogo['precoJog'] ?>"></p>
        <p>Requisitos <input type="text" name="requisitos" value="<?=$jogo['requisitosJog'] ?>"></p>
        <p>Console <input type="text" name="console" value="<?=$jogo['consoleJog'] ?>"></p>
        <p>Classificação<input type="text" name="classificacao" value="<?=$jogo['classificacaoJog'] ?>"></p>
        <p>Avaliação <input type="text" name="avaliacao" value="<?=$jogo['avaliacaoJog'] ?>"></p>
        <button type="submit">Salvar</button>
    </form>
<?php
include("../views/footer.php");
?>