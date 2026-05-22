<?php
// Aqui eu inicio o código PHP deste arquivo
// Aqui eu importo um arquivo apenas uma vez para evitar duplicação
require_once 'config.php';

// Aqui eu verifico uma condição antes de executar algo
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $telefone = trim($_POST['telefone']);

    $stmt = $pdo->prepare("INSERT INTO contatos(nome,email,telefone) VALUES(?,?,?)");
    $stmt->execute([$nome, $email, $telefone]);

    header('Location: index.php');
    exit;
}

// Aqui eu incluo outro arquivo no sistema
include 'cabecalho.php';
?>

<h2>Cadastrar Contato</h2>

<form method="POST">
    <input type="text" name="nome" placeholder="Nome" required>
    <input type="email" name="email" placeholder="E-mail" required>
    <input type="text" name="telefone" placeholder="Telefone">
    <button class="btn btn-cadastrar">Salvar</button>
</form>

<?php include 'rodape.php'; ?>
