<?php
include_once("header.php");
include_once("../models/conexao.php");
include_once("../models/bancoJogos.php");

?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Código</th>
      <th scope="col">Jogo</th>
      <th scope="col">Console</th>
      <th scope="col">Preço</th>
      <th scope="col">Deletar</th>
      <th scope="col">Alterar</th>
    </tr>
  </thead>
  <tbody>
<?php 
$jogos = listaTudoJogos($conexao);
foreach($jogos as $jogo):
?>
  <tr>
      <th scope="row"><?=$jogo['codJog']?></th>
      <td><?=$jogo['nomeJog']?></td>
      <td><?=$jogo['consoleJog']?></td>
      <td><?=$jogo['precoJog']?></td>
      <td>
        <form action="../controllers/deletarJogos.php" method="Post">
          <input type="hidden" name="codJogdeletar" value="<?=$jogo['codJog']?>">
          <button type="submit" class="btn-small btn-danger"> X </button>
        </form>
      </td>
      <td>
        <form action="formAlterarJogos.php" method="Post">
          <input type="hidden" name="codJogalterar" value="<?=$jogo['codJog']?>">
          <button type="submit" class="btn-small btn-danger"> Alterar</button>
        </form>
      </td>
    </tr>
<?php
endforeach;
?>
  </tbody>
</table>





<?php
include_once("footer.php");
?>