<?php
// Aqui eu inicio o código PHP deste arquivo
// Aqui eu importo um arquivo apenas uma vez para evitar duplicação
require_once 'config.php';

$id = $_GET['id'] ?? 0;

$stmt = $pdo->prepare("SELECT * FROM contatos WHERE id=?");
$stmt->execute([$id]);
$contato = $stmt->fetch();

// Aqui eu verifico uma condição antes de executar algo
if(!$contato){
    die('Contato não encontrado.');
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $delete = $pdo->prepare("DELETE FROM contatos WHERE id=?");
    $delete->execute([$id]);

    header('Location: index.php');
    exit;
}

// Aqui eu incluo outro arquivo no sistema
include 'cabecalho.php';
?>

<h2>Confirmar Exclusão</h2>

<p><strong>Nome:</strong> <?= htmlspecialchars($contato['nome']) ?></p>
<p><strong>Email:</strong> <?= htmlspecialchars($contato['email']) ?></p>

<form method="POST">
    <button class="btn btn-excluir">Confirmar Exclusão</button>
</form>

<?php include 'rodape.php'; ?>
