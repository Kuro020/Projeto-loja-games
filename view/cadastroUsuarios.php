<?php
include_once("header.php");
?>
<form method="POST" action="../controller/inserirUsuarios.php">
    <p>Email <input type="email" name="email"></p>
    <p>Senha <input type="password" name="senha"></p>
    <p>PIN <input type="text" name="pin"></p>
    <button type="submit">Salvar</button>
</form>
<?php
include_once("footer.php");
?>