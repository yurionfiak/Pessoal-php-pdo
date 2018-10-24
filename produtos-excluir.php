<?php require_once "global.php" ?>

<?php
try {
    $id = $_GET['id'];
    $produto = new Produto($id);

    $produto->excluir();

    header('Location: produtos.php');
} catch (Exception $e) {
    Erro::trataErro($e);
}