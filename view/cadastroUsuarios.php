<?php
session_start();
$email = isset($_SESSION["emailUsuario"]) ? $_SESSION["emailUsuario"] : null;
if ($email != null) {
    include_once("header.php");
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="container">
    <div class="mb3">
        <form method="POST" action="../controller/inserirUsuarios.php">
            <p>Email <input type="email" name="email"></p>
            <p>Senha <input type="password" name="senha"></p>
            <p>PIN <input type="text" name="pin"></p>
            <button type="submit" class="btn btn-outline-dark">Salvar</button>
        </form>
    </div>
</div>
</div>
<?php
if ($email != null) {
    include_once("footer.php");
}
?>