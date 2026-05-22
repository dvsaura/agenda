<?php
// Aqui eu inicio o código PHP deste arquivo
// Aqui eu importo um arquivo apenas uma vez para evitar duplicação, acho dahora
require_once 'config.php';
require_once 'funcoes_produtos.php';

// Aqui eu incluo outro arquivo no sistema
include 'cabecalho.php';

$produtos = obterProdutos($pdo);
exibirTabelaProdutos($produtos);

include 'rodape.php';
?>
