<?php
// Aqui eu inicio o código PHP deste arquivo
// Aqui eu importo um arquivo apenas uma vez para evitar duplicação
require_once 'config.php';

$id = $_GET['id'] ?? 0;

$stmt = $pdo->prepare("SELECT * FROM contatos WHERE id = ?");
$stmt->execute([$id]);
$contato = $stmt->fetch();

// Aqui eu verifico uma condição antes de executar algo
if(!$contato){
    die('Contato não encontrado.');
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $telefone = trim($_POST['telefone']);

    $update = $pdo->prepare("UPDATE contatos SET nome=?, email=?, telefone=? WHERE id=?");
    $update->execute([$nome, $email, $telefone, $id]);

    header('Location: index.php');
    exit;
}

// Aqui eu incluo outro arquivo no sistema
include 'cabecalho.php';
?>

<h2>Editar Contato</h2>

<form method="POST">
    <input type="text" name="nome" value="<?= htmlspecialchars($contato['nome']) ?>" required>
    <input type="email" name="email" value="<?= htmlspecialchars($contato['email']) ?>" required>
    <input type="text" name="telefone" value="<?= htmlspecialchars($contato['telefone']) ?>">
    <button class="btn btn-editar">Atualizar</button>
</form>

<?php include 'rodape.php'; ?>
