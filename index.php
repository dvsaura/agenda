<?php
// Aqui eu inicio o código PHP deste arquivo
// Aqui eu importo um arquivo apenas uma vez para evitar duplicação
require_once 'config.php';
require_once 'funcoes.php';
// Aqui eu incluo outro arquivo no sistema
include 'cabecalho.php';

$contatos = obterContatos($pdo);
exibirTabelaContatos($contatos);

include 'rodape.php';
?>
