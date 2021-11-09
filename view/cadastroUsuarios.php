<?php
include_once("header.php");
?>
<div class="card">
  <div class="card-body">
        <form method="POST" action="../controller/inserirUsuarios.php">
            <p>Email <input type="email" name="email"></p>
            <p>Senha <input type="password" name="senha"></p>
            <p>PIN <input type="text" name="pin"></p>
            <button type="submit">Salvar</button>
    </div>
</div>
</form>
<?php
include_once("footer.php");
?>