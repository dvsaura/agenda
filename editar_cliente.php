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
    $update = $pdo->prepare("UPDATE clientes SET nome=?, cpf=?, email=?, telefone=?, endereco=? WHERE id=?");

    $update->execute([
        $_POST['nome'],
        $_POST['cpf'],
        $_POST['email'],
        $_POST['telefone'],
        $_POST['endereco'],
        $id
    ]);

    header('Location: clientes.php');
    exit;
}

// Aqui eu incluo outro arquivo no sistema
include 'cabecalho.php';
?>

<h2>Editar Cliente</h2>

<form method="POST">
    <input type="text" name="nome" value="<?= htmlspecialchars($cliente['nome']) ?>" required>
    <input type="text" name="cpf" value="<?= htmlspecialchars($cliente['cpf']) ?>" required>
    <input type="email" name="email" value="<?= htmlspecialchars($cliente['email']) ?>">
    <input type="text" name="telefone" value="<?= htmlspecialchars($cliente['telefone']) ?>">
    <textarea name="endereco"><?= htmlspecialchars($cliente['endereco']) ?></textarea>

    <button class="btn btn-editar">Atualizar</button>
</form>

<?php include 'rodape.php'; ?>
