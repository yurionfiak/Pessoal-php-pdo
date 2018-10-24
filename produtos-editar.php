<?php require_once 'global.php'; ?>

<?php
try {
    $id = $_GET['id'];
    $lista = Categoria::listar();
    $produtos = new Produto($id);
} catch (Exception $e) {
    Erro::trataErro($e);
}
?>


<?php require_once 'cabecalho.php' ?>


<div class="row">
    <div class="col-md-12">
        <h2>Editar Nova Categoria</h2>
    </div>
</div>

<form action="produtos-post_editar.php" method="post">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <input type="hidden" name="id" value="<?= $produtos->id ?>">
                <label for="nome">Nome do Produto</label>
                <input type="text" name="nome" value=" <?= $produtos->nome ?>" class="form-control"
                       placeholder="Nome do Produto"
                       required>
            </div>
            <div class="form-group">
                <label for="preco">Preço da Produto</label>
                <input type="number" name="preco" value="<?= $produtos->preco ?>" step="0.01" min="0"
                       class="form-control"
                       placeholder="Preço do Produto"
                       required>
            </div>
            <div class="form-group">
                <label for="quantidade">Quantidade do Produto</label>
                <input type="number" name="quantidade" value="<?= $produtos->quantidade ?>" min="0" class="form-control"
                       placeholder="Quantidade do Produto"
                       required>
            </div>
            <div class="form-group">
                <label for="categoria_id">Categoria do Produto</label>
                <select class="form-control" name="categoria_id">
                    <?php foreach ($lista as $linha): ?>
                        <?php if($linha['id'] == $produtos->categoria_id) {
                            echo "<option value='$linha[id]' selected>";
                        } else {
                            echo "<option value='$linha[id]'>";
                        }
                        echo $linha['nome'];
                        ?>

                    <?php endforeach ?>
                </select>
            </div>
            <input type="submit" class="btn btn-success btn-block" value="Alterar">
        </div>
    </div>
</form>

<?php require_once 'rodape.php' ?>
