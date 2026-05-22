<?php
// Aqui eu inicio o código PHP deste arquivo
// Aqui eu importo um arquivo apenas uma vez para evitar duplicação
require_once 'config.php';

$erro = '';

// Aqui eu verifico uma condição antes de executar algo
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = trim($_POST['nome']);
    $cpf = trim($_POST['cpf']);
    $email = trim($_POST['email']);
    $telefone = trim($_POST['telefone']);
    $endereco = trim($_POST['endereco']);

    if(strlen($cpf) != 14){
        $erro = 'CPF inválido. Use 000.000.000-00';
    } else {
        $stmt = $pdo->prepare("INSERT INTO clientes(nome,cpf,email,telefone,endereco) VALUES(?,?,?,?,?)");
        $stmt->execute([$nome,$cpf,$email,$telefone,$endereco]);

        header('Location: clientes.php');
        exit;
    }
}

// Aqui eu incluo outro arquivo no sistema
include 'cabecalho.php';
?>

<h2>Cadastrar Cliente</h2>

<p style="color:red;"><?= $erro ?></p>

<form method="POST">
    <input type="text" name="nome" placeholder="Nome" required>
    <input type="text" name="cpf" placeholder="000.000.000-00" maxlength="14" required>
    <input type="email" name="email" placeholder="Email">
    <input type="text" name="telefone" placeholder="Telefone">
    <textarea name="endereco" placeholder="Endereço"></textarea>

    <button class="btn btn-cadastrar">Salvar Cliente</button>
</form>

<?php include 'rodape.php'; ?>
