<?php
include_once("header.php");
include_once("../model/conexao.php");
include_once("../model/bancoCliente.php");
?>
<div class="container m-5 p-5">
    <form action="listaTudoClientesNome.php" method="GET">
        <div class="row mb-3">
            <label for="inputNome" class="col-sm-2 col-form-label">Digite o Nome do Cliente: </label>
            <div class="col-sm-3">
                <input type="text" name="NomeCli" class="form-control" id="inputNome" required>
            </div>
            <div class="col-sm-3">
                <button type="submit" class="btn btn-dark">Buscar</button>
            </div>
        </div>
    </form>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Código</th>
            <th scope="col">Código Usuário</th>
            <th scope="col">Cliente</th>
            <th scope="col">CPF</th>
            <th scope="col">Telefone</th>
            <th scope="col">Data de nascimento</th>
            <th scope="col">Deletar</th>
            <th scope="col">Alterar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $nomeCliente = isset($_GET['NomeCli']) ? $_GET['NomeCli'] :"";
        if ($nomeCliente != "") {
            $cliente = listaTudoClientesNome($conexao, $nomeCliente);
            if ($cliente) {

                foreach($cliente as $clientes) :
        ?>
                <tr>
                    <th scope="row"><?= $clientes['codCli'] ?></th>
                    <td><?= $clientes['nomeCli'] ?></td>
                    <td><?= $clientes['codUsuFK'] ?></td>
                    <td><?= $clientes['cpfCli'] ?></td>
                    <td><?= $clientes['foneCli'] ?></td>
                    <td><?= $clientes['datanasCli'] ?></td>
                    <td>
                        <form action="../controller/deletarClientes.php" method="POST">
                            <input type="hidden" name="codCliDeletar" value="<?= $clientes['codCli'] ?>">
                            <button type="submit" class="btn-small btn-danger">Deletar</button>
                        </form>
                    </td>
                    <td>
                        <form action="formAlterarCliente.php" method="POST">
                            <input type="hidden" name="codCliAlterar" value="<?= $clientes['codCli'] ?>">
                            <button type="submit" class="btn-small btn-success">Alterar</button>
                        </form>
                    </td>
                </tr>
        <?php
        endforeach;
            }
        }
        ?>

    </tbody>
</table>
<?php
include_once("footer.php");
?>