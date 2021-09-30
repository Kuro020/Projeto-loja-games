<?php
    include("../views/header.php");
?>  
    <form method="Post" action="../controllers/inserirJogos.php">
        <p>Jogo <input type="text" name="jogo"></p>
        <p>Tamanho do jogo<input type="text" name="tamanho"></p>
        <p>Preço <input type="text" name="preco"></p>
        <p>Requisitos <input type="text" name="requisitos"></p>
        <p>Console <input type="text" name="console"></p>
        <p>Classificação<input type="text" name="classificacao"></p>
        <p>Avaliação <input type="text" name="avaliacao"></p>
        <button type="submit">Salvar</button>
    </form>
<?php
include("../views/footer.php");
?>