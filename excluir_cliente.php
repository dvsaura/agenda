<?php
// Aqui eu inicio o código PHP deste arquivo
// Aqui eu importo um arquivo apenas uma vez para evitar duplicação
require_once 'config.php';

$id = $_GET['id'] ?? 0;

$stmt = $pdo->prepare("SELECT * FROM clientes WHERE id=?");
$stmt->execute([$id]);
$cliente = $stmt->fetch();

// Aqui eu verifico uma condição antes de executar algo
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $delete = $pdo->prepare("DELETE FROM clientes WHERE id=?");
    $delete->execute([$id]);

    header('Location: clientes.php');
    exit;
}

// Aqui eu incluo outro arquivo no sistema
include 'cabecalho.php';
?>

<h2>Excluir Cliente</h2>

<p>Deseja excluir o cliente <strong><?= htmlspecialchars($cliente['nome']) ?></strong>?</p>

<form method="POST">
    <button class="btn btn-excluir">Confirmar Exclusão</button>
</form>

<?php include 'rodape.php'; ?>
