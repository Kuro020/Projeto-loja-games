<?php
include_once("header.php");
?>
<form method="POST" action="../controller/inserirUsuarios.php">
    <p>Email <input type="text" name="email"></p>
    <p>Senha <input type="text" name="senha"></p>
    <button type="submit">Salvar</button>
</form>
<?php
include_once("footer.php");
?>